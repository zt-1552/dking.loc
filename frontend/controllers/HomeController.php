<?php


namespace frontend\controllers;

use backend\components\AppController;
use common\models\Category;
use common\models\LoginForm;
use common\models\Product;
use Yii;
use yii\web\HttpException;
use yii\web\Response;

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

//    public function actionIndex()
//    {
//        $offers = Product::find()->where(['is_offer' => 1])->limit(5)->all();
//
//        return $this->render('index', compact('offers'));
//    }

    public function actionIndex1()
    {
        $this->layout = 'front1';
        $offers = Product::find()->where(['is_offer' => 1])->limit(16)->all();
        $bestsellers = Product::find()->where(['bestsellers' => 1])->limit(3)->all();
        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();


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

    public function actionAjaxLogin() {
        if (Yii::$app->request->isAjax) {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->login()) {
                    return $this->goBack(Yii::$app->request->referrer);
                } else {
                    Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
                    return \yii\widgets\ActiveForm::validate($model);
                }
            }
        } else {
            throw new HttpException(404 ,'Page not found');
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goBack(Yii::$app->request->referrer);
    }


}