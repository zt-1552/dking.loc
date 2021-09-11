<?php


namespace frontend\controllers;

use backend\components\AppController;
use common\models\Product;

class HomeController extends AppController
{

    public function actionIndex()
    {
        $offers = Product::find()->where(['is_offer' => 1])->limit(4)->all();
//        debug($offers);

        return $this->render('index', compact('offers'));
    }

}