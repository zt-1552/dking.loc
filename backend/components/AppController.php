<?php


namespace backend\components;

use yii\web\Controller;

class AppController extends Controller
{
    public function beforeAction($action)
    {
        $this->view->title = \Yii::$app->name;
        return parent ::beforeAction($action); // TODO: Change the autogenerated stub
    }

    protected function setMeta($title = null, $description= null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);

    }

}