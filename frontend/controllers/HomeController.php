<?php


namespace frontend\controllers;

use backend\components\AppController;
use common\models\Product;

class HomeController extends AppController
{

    public function actionIndex()
    {
<<<<<<< HEAD
        $offers = Product::find()->where(['is_offer' => 1])->limit(4)->all();
=======
        $offers = Product::find()->where(['is_offer' => 1])->limit(2)->all();
>>>>>>> origin/main
//        debug($offers);

        return $this->render('index', compact('offers'));
    }

}