<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет....');
        }
    }

}