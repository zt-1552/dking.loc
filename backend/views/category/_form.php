<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
        'template' => "
                        <div class='col-md-6'>
                            <p>{label}</p> \n {input} \n
                            <div>{error}</div>
                        </div>
                    ",
        ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'parent_id')->dropDownList(['Корневая категория', 'Другая']) ?>
    <div class="form-group field-category-parent_id has-success">
        <div class='col-md-6'>

        <label class="control-label" for="category-parent_id">Родительская категория</label>
            <select id="category-parent_id" class="form-control" name="Category[parent_id]" aria-invalid="false">
                <option value="0">Корневая категория</option>
                <?= \common\components\MenuWidget::widget([
                    'tpl' => 'select',
                    'ul_class' => '',
                    'model' => $model,
                    'cache_time' => 0,
                ])?>

            </select>

            <div><div class="help-block"></div></div>
        </div>

    </div>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'short_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
