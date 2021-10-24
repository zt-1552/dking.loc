<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\CategoryAttributes;
use common\models\Product;
use common\models\Values;
use Yii;
use yii\data\Pagination;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public $layout = 'category';

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $category = Category::findOne($id);

        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет....');
        }

        // Установка метатегов
        $this->setMeta("{$category->meta_title} :: " . \Yii::$app->name, $category->meta_description);

        // Breadcrumbs
        $breadcrumbs = $this->getParents($id);
        if (count($breadcrumbs) > 1) {
            $last_bread = array_pop($breadcrumbs);

            for ($i = 0; $i < count($breadcrumbs); $i++) {
                $this->view->params['breadcrumbs'][$i]['label'] = $breadcrumbs[$i]['name'];
                $this->view->params['breadcrumbs'][$i]['url'] = Url::to(['category/view', 'id' => $breadcrumbs[$i]['id']]);
                array_push($this->view->params['breadcrumbs'], array('label' => $last_bread['name']));
            };
        } else {
            $last_bread = $breadcrumbs[0];
            $this->view->params['breadcrumbs'][]['label'] =  $last_bread['name'];
        }

        // Главные категории
        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();

        //Все ПодКатегории всех уровней этой категории
//        $child_category = $this->getChild($id); // max 3 level tree, min request
        $child_all_category = $this->getAllChild($id);// for all level tree, + request

        // Список товаров
        $query = Product::find();
        $query->with('values')->where(['category_id' => $id]);
        if(isset($child_all_category[1])) {
            foreach ($child_all_category[1] as $item) {
                $query->orWhere(['category_id' => $item['id']]);
            }
        }

        // Подкатегории только нижнего уровня
        $child_categories = $child_all_category[0];

        // Пагинация
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        // filters (attributes + values)
        $categoryAttributes = CategoryAttributes::find()->where(['category_id' => $id])->with('attributes0')->asArray()->all();
        if (!empty($categoryAttributes)) {
             foreach ($categoryAttributes as &$categoryAttribute):
                 $values = Values::find()->asArray()->where(['attributes_id' => $categoryAttribute['attributes0']['id']])->all();
                 $categoryAttribute['attributeValue'] = $values;
             endforeach;
        }

        return $this->render('view', compact('products', 'category', 'breadcrumbs', 'child_categories', 'pages', 'categoryAttributes'));
    }


    public function actionSearch($query = '', $page = 1)
    {
        $page = (int)$page;

        // получаем результаты поиска с постраничной навигацией
        list($products, $pages) = (new Product())->getSearchResult($query, $page);

        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();


        return $this->render(
            'search',
            compact('products', 'pages', 'query')
        );
    }


    /**
     * @param $category_id
     * @return mixed
     */
    public function getParents($category_id)
    {
        $parents = \Yii::$app->cache->get('parents_category_' . $category_id);

        if ($parents) {
            return $parents;
        };

        $category_all = Category::find()->indexBy('id')->asArray()->all();

        $category = $category_all[$category_id];

        $parents[0] = $category;

        if($category['parent_id'] != 0) {

            while ($parents[0]['parent_id'] != 0) {
                $parent = $category_all[$parents[0]['parent_id']];
                array_unshift($parents, $parent);
            }
        }

//        set Cache
        \Yii::$app->cache->set('parents_category_' . $category_id, $parents, 360);
        return $parents;
    }

    /**
     * This method for 4 and up level tree
     * @param $id
     * @return array
     */
    protected function getAllChild($id) {
        $children = [];
        $ids = $this->getChildIds($id);
        foreach ($ids as $item) {
            $children[] = $item;
            $c = $this->getAllChild($item['id']);
            foreach ($c as $v) {
                $children[] = $v;
            }
        }
        return [$ids, $children];
    }

    /**
     * @param $id
     * @return array
     */
    protected function getChildIds($id) {
        $children = Category::find()->where(['parent_id' => $id])->asArray()->all();
        $ids = [];
        foreach ($children as $child) {
            $ids[] = $child;
        }
        return $ids;
    }


    /**
     * This method for max 3 level tree
     * @param $category_id
     * @return array
     */
    public function getChild($category_id)
    {
//        $child_category = \Yii::$app->cache->get('child_category_' . $category_id);

        if ($child_category) {
            return $child_category;
        };

        $category_all = Category::find()->indexBy('id')->asArray()->all();

        $category = $category_all[$category_id];

        $child = [];

        foreach ($category_all as $item) {
            if ($item['parent_id'] === $category['id']) {
                array_push($child, $item);
            }
        }

        $child_two = [];
        foreach ($child as $item_child) {
            foreach ($category_all as $item) {
                if ($item['parent_id'] === $item_child['id']) {
                    array_push($child_two, $item);
                }
            }
        }

        foreach ($child_two as $item) {
            array_push($child, $item);
        }

//        set Cache
        \Yii::$app->cache->set('child_category_' . $category_id, $child, 360);
        return $child;
    }

}