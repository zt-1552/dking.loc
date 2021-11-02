<?php

use common\models\Attributes;
use common\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryAttributes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-attributes-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'category_id')->textInput() ?>
    <?= $form->field($model, 'category_id')->dropdownList(
        Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите категорию']); ?>

<!--    --><?//= $form->field($model, 'attributes_id')->textInput() ?>
    <?= $form->field($model, 'attributes_id')->dropdownList(
        Attributes::find()->select(['title', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите название фильтра']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
