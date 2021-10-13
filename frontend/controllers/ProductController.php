<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\Product;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{

    public function actionView($id)
    {
        $this->layout = 'product';

        $product = Product::findOne($id);
        if (empty($product)) {
            throw new NotFoundHttpException('Такого товара нет....   пока нет)');
        }

        $category = Category::find()->where(['id' => $product->category_id])->one();

        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();

        // Breadcrumbs
        $breadcrumbs = $this->getParents($product->category_id);
        if (count($breadcrumbs) >= 1) {
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    $this->view->params['breadcrumbs'][$i]['label'] = $breadcrumbs[$i]['name'];
                    $this->view->params['breadcrumbs'][$i]['url'] = Url::to(['category/view', 'id' => $breadcrumbs[$i]['id']]);
                };
            array_push($this->view->params['breadcrumbs'], ['label' => $product->title]);
        }


        if (empty($product)) {
            throw new NotFoundHttpException('Такого товара еще нет....');
        }

        return $this->render('view', compact('product', 'category'));

    }

    public function getParents($category_id)
    {
//        $parents = \Yii::$app->cache->get('parents_category_' . $category_id);
//
//        if ($parents) {
//            return $parents;
//        };

        $category_all = Category::find()->indexBy('id')->asArray()->all();

        $category = $category_all[$category_id];

//        debug($category);

        $parents[0] = $category;

        if($category['parent_id'] != 0) {

            while ($parents[0]['parent_id'] != 0) {
                $parent = $category_all[$parents[0]['parent_id']];
                array_unshift($parents, $parent);
            }
        }

//        set Cache
//        \Yii::$app->cache->set('parents_category_' . $category_id, $parents, 360);
        return $parents;
    }

}