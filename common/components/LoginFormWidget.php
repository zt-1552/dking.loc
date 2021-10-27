<?php


namespace common\components;

use yii\base\Widget;


/**
 * Class MenuWidget
 * @package common\components
 */
class LoginFormWidget extends Widget
{

    public function run()
    {
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
            return $this->render('loginFormWidget', [
                'model' => $model,
            ]);
        } else {
            return ;
        }
    }

}














