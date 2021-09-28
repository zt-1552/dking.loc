<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{

    public function actionView($id)
    {
        $this->layout = 'product';

        $product = Product::findOne($id);
        $category = Category::find()->where(['id' => $product->category_id])->one();


        if (empty($product)) {
            throw new NotFoundHttpException('Такого товара еще нет....');
        }

        return $this->render('view', compact('product', 'category'));

    }

}