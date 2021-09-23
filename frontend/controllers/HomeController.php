<?php


namespace frontend\controllers;

use backend\components\AppController;
use common\models\Product;

class HomeController extends AppController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

        $offers = Product::find()->where(['is_offer' => 1])->limit(4)->all();

//        debug($offers);

        return $this->render('index', compact('offers'));
    }

    public function actionError()
    {
        $this->layout = 'front';

    }

}