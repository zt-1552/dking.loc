<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\Product;
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
//        $this->layout = 'category';

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет....');
        }

        $this->setMeta("{$category->meta_title} :: " . \Yii::$app->name, $category->meta_description);


        // Breadcrumbs
        $breadcrumbs = $this->getParents($id);
        if (count($breadcrumbs) > 1) {
            $last_bread = array_pop($breadcrumbs);

            for ($i = 0; $i < count($breadcrumbs); $i++) {
                $this->view->params['breadcrumbs'][$i]['label'] = $breadcrumbs[$i]['name'];
                $this->view->params['breadcrumbs'][$i]['url'] = Url::to(['category/view', 'id' => $breadcrumbs[$i]['id']]);
//            debug($breadcrumb);
                array_push($this->view->params['breadcrumbs'], array('label' => $last_bread['name']));
            };
        } else {
            $last_bread = $breadcrumbs[0];
            $this->view->params['breadcrumbs'][]['label'] =  $last_bread['name'];
        }

//        $temp = new Category();
//        $childAllNew = $temp->getAllChildIds($id);
//        debug($childAllNew);


        $main_categories = $this->getMainCategories();

        $child_category = $this->getChild($id);
//        debug($child_category);



        $query = Product::find();
        $query->where(['category_id' => $id]);
        if(isset($child_category)) {
            foreach ($child_category as $item) {
                $query->orWhere(['category_id' => $item['id']]);
            }
        }

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('products', 'category', 'breadcrumbs', 'main_categories', 'pages'));

    }



    /**
     * Главные категории
     * @return array|mixed
     */
    public function getMainCategories()
    {
        $data = \Yii::$app->cache->get('main_categories');
        if ($data === false) {
            $data = Category::find()->where(['parent_id' => null])->indexBy('id')->asArray()->all();

            \Yii::$app->cache->set('main_categories', $data, 30);
        }
        return $data;
    }


    public function actionSearch($query = '', $page = 1)
    {
        $page = (int)$page;

        // получаем результаты поиска с постраничной навигацией
        list($products, $pages) = (new Product())->getSearchResult($query, $page);

//        debug($products);

        $main_categories = $this->getMainCategories();

        // устанавливаем мета-теги для страницы
//        $this->setMetaTags('Поиск по каталогу');

        return $this->render(
            'search',
            compact('products', 'pages', 'main_categories')
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

    public function getChild($category_id)
    {
        $child_category = \Yii::$app->cache->get('child_category_' . $category_id);

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


//        debug($child);

//        set Cache
        \Yii::$app->cache->set('child_category_' . $category_id, $child, 360);
        return $child;
    }

}