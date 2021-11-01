<div class="login-box">
   <div class="card">
        <div class="card-body login-card-body">
            <h2 class="login-box-msg">Авторизация</h2>


            <?php
            use yii\helpers\Html;
            use yii\widgets\ActiveForm;

            $form = ActiveForm::begin([
                'id' => 'login-form',
                'enableAjaxValidation' => true,
                'action' => ['site/ajax-login'],
            ]); ?>

            <?= $form->field($model, 'username')->label('Имя пользователя')->textInput(['autofocus' => true, 'class' => 'form-control']) ?>

            <?= $form->field($model, 'password')->label('Пароль')->passwordInput(['class' => 'form-control']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox(['label' => 'Запомнить меня']) ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <p class="mb-0">
                <a href="register.html" class="text-center">Регистрация</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->