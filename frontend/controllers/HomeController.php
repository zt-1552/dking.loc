<?php


namespace frontend\controllers;

use backend\components\AppController;

class HomeController extends AppController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}