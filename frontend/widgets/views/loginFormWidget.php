<?php

use yii\base\Widget;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

Modal::begin([
    'size' => 'modal-lg',
//    'header' => '<h2>Create Vote</h2>',
//    'header'=>'<h4>Login</h4>',
    'id'=>'login-modal',
]);
?>

<h2>Авторизация</h2>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'action' => ['home/ajax-login']
]);
echo $form->field($model, 'username')->textInput();
echo $form->field($model, 'password')->passwordInput();
echo $form->field($model, 'rememberMe')->checkbox();
?>

    <div class="form-group">
        <div class="text-right">

            <?php
            echo Html::button('Cancel', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']);
            echo Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']);
            ?>

        </div>
    </div>

<?php
ActiveForm::end();
Modal::end();