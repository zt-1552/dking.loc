<?php

use yii\base\Widget;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

Modal::begin([
    'size' => 'modal-md',
//    'header' => '<h2>Create Vote</h2>',
//    'header'=>'<h4>Login</h4>',
    'id'=>'login-modal',
]);
?>


    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#register" role="tab">Регистрация</a>
        </li>
        <li class="nav-item">
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#login" role="tab">Авторизация</a>
        </li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane" id="register" role="tabpanel" aria-labelledby="list-home-list">

            <div class="h2 mb-3 mt-2">Форма регистрации</div>

            <div class="modal-footer">
                <a href="<?= \yii\helpers\Url::to('cart/checkout')?>" class="btn btn-success">Регистрация</a>
            </div>
        </div>
        <div class="tab-pane" id="login" role="tabpanel" aria-labelledby="list-home-list">
            <div class="h2 mb-3 mt-2">Форма авторизации</div>
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
                ActiveForm::end();?>
        </div>

    </div>





<!--    <h2>Авторизация</h2>-->


<?php Modal::end(); ?>