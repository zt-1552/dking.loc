<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'category_id')->textInput() ?>

    <div class="form-group field-product-category_id has-success">
        <div class='col-md-6'>

            <label class="control-label" for="product-category_id">Категория</label>
            <select id="product-category_id" class="form-control" name="Product[category_id]" aria-invalid="false">
                <?= \common\components\MenuWidget::widget([
                    'tpl' => 'select_create',
                    'ul_class' => '',
                    'model' => $model,
                    'cache_time' => 0,
                ])?>

            </select>

            <div><div class="help-block"></div></div>
        </div>

    </div>

<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::class,[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full
            'inline' => false, //по умолчанию false
        ],
    ]);?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_offer')->dropDownList(['', 'Sale']) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'bestsellers')->dropDownList(['', 'Bestseller']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
