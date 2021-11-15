<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$array = [];
$name = [];
$napoln = [];

foreach ($categoryAttributes as $value){
    $name[$value['attributes0']['id']] = $value['attributes0']['title'];
    foreach ($value['attributeValue'] as $attributeValue) {
        $array[$value['attributes0']['id']][$attributeValue['id']] = $attributeValue['value'];
    }
}


$this -> registerJs(
    '$("document").ready(function(){
            $("#filter_form").on("pjax:end", function() {
            $.pjax.reload({container:"#myFilter"});  //Reload View
        });
    });'
);

?>

    <?php yii\widgets\Pjax::begin([
        'id' => 'filter_form',
        'timeout' => 10000
    ]) ?>


<?php $form = ActiveForm::begin([
        'action' => \yii\helpers\Url::to(['category/filter', 'id' => $category_id]),
        'method' => 'get',
]) ?>

<?= Html::submitButton('Применить', ['class' => 'btn btn-outline-secondary m-3']) ?>
<a class="btn btn-outline-secondary m-3" href="<?= Url::to(['category/view', 'id' => $category_id]) ?>">Сбросить</a>

<?php if (!empty($array)) { ?>

    <?php foreach ($array as $key => $value) : ?>
        <p></p>
        <h3><?= $name[$key] ?></h3>
        <div class="form-check">
            <?= $form->field($model, "attributeValue[$key]")->checkboxList($value, [
                'separator'=>'<br/>',
                'item' => function($index, $label, $name, $checked, $value){
                    if($checked){
                        $ch = 'checked';
                    }
                    return "<input class='form-check-input' type='checkbox' name='$name' id='$value' value='$value' $ch/><label class='form-check-label mb-2' for='$value'>$label</label>";
                }
            ])->label(false) ?>
        </div>
    <?php endforeach; ?>
    <?= Html::submitButton('Применить', ['class' => 'btn btn-outline-secondary m-3']) ?>
    <a class="btn btn-outline-secondary m-3" href="<?= Url::to(['category/view', 'id' => $category_id]) ?>">Сбросить</a>

<?php } ?>


<?php ActiveForm::end() ?>

<?php yii\widgets\Pjax::end(); ?>


