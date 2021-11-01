<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\LoginForm;
use Yii;
use yii\web\Response;

class AuthController extends AppController
{

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->redirect('/admin');
            return $this->goBack();
        }

        $model->password = '';

        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/');
    }

}