<?php


namespace frontend\controllers;

use backend\components\AppController;
use common\models\Category;
use common\models\Product;
use Yii;

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


    public function actionIndex1()
    {
        $this->layout = 'front1';
        $offers = Product::find()->where(['is_offer' => 1])->limit(16)->all();
        $bestsellers = Product::find()->where(['bestsellers' => 1])->limit(3)->all();
        \Yii::$app->params['main_categories'] = (new Category) -> getMainCategories();


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
        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();

        return $this->render('contact');
    }


}