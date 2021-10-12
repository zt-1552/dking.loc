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
        $offers = Product::find()->where(['is_offer' => 1])->limit(5)->all();

        return $this->render('index', compact('offers'));
    }

    public function actionIndex1()
    {
        $this->layout = 'front1';
        $offers = Product::find()->where(['is_offer' => 1])->limit(16)->all();
        $bestsellers = Product::find()->where(['bestsellers' => 1])->limit(3)->all();

        return $this->render('index1', compact('offers', 'bestsellers'));
    }


    public function actionError()
    {
        $this->layout = 'category';

    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

}