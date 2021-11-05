<?php

use yii\helpers\Html;
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

?>

<p><?= debug($array) ?></p>
<!--<p>--><?//= debug($name) ?><!--</p>-->
<!--<p>--><?//= debug($url) ?><!--</p>-->
<!--<p>--><?//= debug($product_values) ?><!--</p>-->

<?php $form = ActiveForm::begin([
        'action' => \yii\helpers\Url::to(['category/filter', 'id' => $category_id]),
        'method' => 'get',
]) ?>

    <?php foreach ($array as $key => $value) : ?>
    <?php debug($value);?>
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
<a class="btn btn-outline-secondary m-3" href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category_id]) ?>">Сбросить</a>


<?php ActiveForm::end() ?>

<?// debug($category_id); ?>
