<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\Product;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $this->layout = 'category';

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет....');
        }


        $breadcrumbs = [];
        if($category->parent_id != 0) {
            $category_b = Category::find()->indexBy('id')->asArray()->all();
            array_unshift($breadcrumbs, $category_b[$category->id]);
//debug($breadcrumbs);

            $parent = $breadcrumbs;

            while ($parent[0]['parent_id'] != 0) {
                $parent[0] = $category_b[$parent[0]['parent_id']];
                array_unshift($breadcrumbs, $parent[0]);
//                debug($parent);
            }
        }

//        debug($breadcrumbs);


        $products = Product::find()->where(['category_id' => $id])->all();

        return $this->render('view', compact('products', 'category', 'breadcrumbs'));

    }

}