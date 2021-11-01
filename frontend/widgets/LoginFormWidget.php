<?php


namespace frontend\widgets;


use common\models\LoginForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\Widget;

class LoginFormWidget extends Widget
{

    public string $view0;

    public function init()
    {
        parent ::init();
//        if ($this->view0 === null) {
            $this->view0 = 'loginFormWidgetMy';
//        }
    }


    public function run() {
        if (Yii::$app->user->isGuest) {
            $modelSign = new SignupForm();
            $model = new LoginForm();
            return $this->render($this->view0, [
                'model' => $model,
                'modelSign' => $modelSign,
            ]);
        } else {
            return ;
        }
    }


}