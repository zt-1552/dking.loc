<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\CategoryAttributes;
use common\models\helpers\CategoryHelper;
use common\models\Product;
use common\models\ProductValues;
use common\models\Values;
use Yii;
use yii\caching\TagDependency;
use yii\data\Pagination;
use yii\db\Query;
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
        $this->getBreadcrumbsCategory($id);

        // Главные категории
        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();


        //Все ПодКатегории всех уровней этой категории
//        $child_category = $this->getChild($id); // max 3 level tree, min request
        $child_all_category = $this->getAllChild($id);// for all level tree, + request
//        debug($child_all_category);

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
        $categoryAttributes = CategoryHelper::getAllCategoryAttributesAndValues($id);
//        debug($categoryAttributes);

        //КОНЕЦ КОПИРОВАНИЯ

        return $this->render('view', compact('products', 'category', 'breadcrumbs', 'child_categories', 'child_all_category', 'pages', 'categoryAttributes'));
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

    public function actionFilter()
    {
        $category_id = Yii::$app->request->get('id');
        $filterProducts = Yii::$app->request->get('FilterProduct');
        $range = '';
        $sort = '';
        $min = '';
        $max = '';
        $productValue = [];


        $nullFilterProducts = array_filter($filterProducts['attributeValue']);
        if (empty($nullFilterProducts)) {
            return $this->actionView($category_id);
        }

        // Breadcrumbs
        $this->getBreadcrumbsCategory($category_id);

        // Главные категории
        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();

        $child_all_category = $this->getAllChild($category_id);// for all level tree, + request

        // Подкатегории только нижнего уровня
        $child_categories = $child_all_category[0];

        // filters (attributes + values)
        $categoryAttributes = CategoryHelper::getAllCategoryAttributesAndValues($category_id);


        if ($filterProducts != null) {

            $query1 = (new \yii\db\Query());
            $i = 1;

            foreach ($filterProducts['attributeValue'] as $key => $filterProduct) {
//                debug($filterProduct);

                if (!empty($filterProduct) && $i == 1){
                    $asTbl = 'v'.$i;
                    $subQuery = 'sq'.$i;
                    $query1->select($asTbl.'.product_id')->from([$asTbl => 'product_values'])->where([$asTbl.'.values_id' => $filterProduct]);
                    $i++;
                }
                if (!empty($filterProduct) && $i > 1){
                    $asTbl = 'v'.$i;
                    $subQuery = 'sq'.$i;
                    $subQuery = (new \yii\db\Query())->from('product_values')->where(['values_id' => $filterProduct]);
                    $query1->innerJoin([$asTbl => $subQuery],  'v'.$i.'.product_id'.' = v'.($i-1).'.product_id');
                    $i++;
                }
            }
            $productValuesNew = $query1->all();
        }


        //Вытаскиваем все ID товаров у которых есть нужные нам фильтры
        $idsProductValuesNew = [];
        if ($productValuesNew != null) {

            foreach ($productValuesNew as $idProduct) {
                $idsProductValuesNew[] = $idProduct['product_id'];
            }
        }


        $category = Category::findOne($category_id);
        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет....');
        }
        // Список товаров заменяется на нужный
        $query = Product::find();
        $query->with('values')->where(['category_id' => $category_id]);
        if(isset($child_all_category[1])) {
            foreach ($child_all_category[1] as $item) {
                $query->orWhere(['category_id' => $item['id']]);
            }
        }
        $query->andWhere(['id' => $idsProductValuesNew]);

        // Пагинация
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();


        if(Yii::$app->request->getHeaders()->has('X-PJAX')) {

            return $this->renderAjax('view', compact('products', 'category', 'breadcrumbs', 'child_categories', 'child_all_category', 'pages', 'categoryAttributes'));

        } else {

            return $this->render('view', compact('products', 'category', 'breadcrumbs', 'child_categories', 'child_all_category', 'pages', 'categoryAttributes'));
        }

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
        \Yii::$app->cache->set('parents_category_' . $category_id, $parents, 0, new TagDependency(['tags' => 'category']));

        return $parents;
    }


    /**
     * This method for 4 and up level tree
     * @param $id
     * @return array
     */
    protected function getAllChild($id) {

        $data = \Yii::$app->cache->get('child_allChild_' . $id);
        if ($data) {
            return $data;
        }

        $allChild = [];
        $child = $this->getChildIds($id);
//        debug($ids); die;
        foreach ($child as $item) {
            $allChild[] = $item;
            $c = $this->getChildIds($item['id']);
            foreach ($c as $v) {
                $allChild[] = $v;
            }
        }
        //        set Cache
        \Yii::$app->cache->set('child_allChild_' . $id, [$child, $allChild], 0, new TagDependency(['tags' => 'category']));

//        debug($child);
        return [$child, $allChild];
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
//    public function getChild($category_id)
//    {
//        $child_category = \Yii::$app->cache->get('child_category_' . $category_id);
//
//        if ($child_category) {
//            return $child_category;
//        };
//
//        $category_all = Category::find()->indexBy('id')->asArray()->all();
//
//        $category = $category_all[$category_id];
//
//        $child = [];
//
//        foreach ($category_all as $item) {
//            if ($item['parent_id'] === $category['id']) {
//                array_push($child, $item);
//            }
//        }
//
//        $child_two = [];
//        foreach ($child as $item_child) {
//            foreach ($category_all as $item) {
//                if ($item['parent_id'] === $item_child['id']) {
//                    array_push($child_two, $item);
//                }
//            }
//        }
//
//        foreach ($child_two as $item) {
//            array_push($child, $item);
//        }
//
//        //set Cache
//        \Yii::$app->cache->set('child_category_' . $category_id, $child,
//            new TagDependency(['tags' => 'category']));
//        return $child;
//    }

    public function getBreadcrumbsCategory($category_id)
    {
        // Breadcrumbs
        $breadcrumbs = $this->getParents($category_id);
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

    }

}