<?php


namespace backend\controllers;


class HomeController extends \backend\components\AppAdminController
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
        return $this->render('index');
    }

    public function actionError()
    {
        $this->layout = 'admin';

    }

}