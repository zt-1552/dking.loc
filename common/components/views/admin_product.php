<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$array = [];
$name = [];

foreach ($categoryAttributes as $value){
    $name[$value['attributes0']['id']] = $value['attributes0']['title'];
    foreach ($value['attributeValue'] as $attributeValue) {
        $array[$value['attributes0']['id']][$attributeValue['id']] = $attributeValue['value'];
    }
}

?>

<!--<p>--><?//= debug($array) ?><!--</p>-->
<!--<p>--><?//= debug($name) ?><!--</p>-->
<!--<p>--><?//= debug($url) ?><!--</p>-->
<!--<p>--><?//= debug($product_values) ?><!--</p>-->

<?php $form = ActiveForm::begin([
        'action' => \yii\helpers\Url::to(['', 'id' => $category_id]),
        'method' => 'get',
]) ?>
<?php if (!empty($array)) { ?>

    <?php foreach ($array as $key => $value) : ?>
            <?php debug($value);?>



        <div class="form-group field-attribute-<?= $key ?>" has-success">
            <div class='col-md-6'>

                <label class="control-label" for="attribute-<?= $key ?>"><?= $name[$key] ?></label>
                <select id="attribute-<?= $key ?>" class="form-control" name="ProductValues[<?= $key ?>]" aria-invalid="false">
                    <option value="0">Выберите значение</option>
                        <?php foreach ($value as $k => $v) : ?>

                            <option value="<?= $k ?>"
                            <?php if(in_array($k, $modelsValuesIds)) echo ' selected ';?>
<!--                            >-->
                            <?= "{$v}" ?>
                            </option>


                        <?php endforeach; ?>


                </select>

                <div><div class="help-block"></div></div>
            </div>

        </div>





<!--        <p></p>-->
<!--        <h3>--><?//= $name[$key] ?><!--</h3>-->
<!--        <div class="form-check">-->
<!--            --><?//= $form->field($model, "attributeValue[$key]")->checkboxList($value, [
//                'separator'=>'<br/>',
//                'item' => function($index, $label, $name, $checked, $value){
//                    if($checked){
//                        $ch = 'checked';
//                    }
//                    return "<input class='form-check-input' type='checkbox' name='$name' id='$value' value='$value' $ch/><label class='form-check-label mb-2' for='$value'>$label</label>";
//                }
//            ])->label(false) ?>
<!--        </div>-->
    <?php endforeach; ?>
    <?= Html::submitButton('Применить', ['class' => 'btn btn-outline-secondary m-3']) ?>
    <a class="btn btn-outline-secondary m-3" href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category_id]) ?>">Сбросить</a>

<?php } ?>


<?php ActiveForm::end() ?>

<?// debug($category_id); ?>
