<?php


$array = [];
$name = [];

foreach ($categoryAttributes as $value){
    $name[$value['attributes0']['id']] = $value['attributes0']['title'];
    foreach ($value['attributeValue'] as $attributeValue) {
        $array[$value['attributes0']['id']][$attributeValue['id']] = $attributeValue['value'];
    }
} ?>

<?//= debug($array) ?>
<?//= debug($name) ?>
<?//= debug($url) ?>
<?//= debug($product_values) ?>

<div class="col-md-6 m-4 p-2" style="background-color: #e8e8e8;">
    <h4>Фильтры/характеристики</h4>

    <?php if (!empty($array)) { ?>

<!--    --><?php //debug($modelsValuesIds); ?>

    <?php foreach ($array as $key => $value) : ?>
    <!--            --><?php //debug($value);?>

    <div class="form-group field-attribute-<?= $key ?>" has-success">
    <div class='col-md-12'>

        <label class="control-label" for="attribute-<?= $key ?>"><?= $name[$key] ?></label>
        <select id="attribute-<?= $key ?>" class="form-control hidden-value" name="ProductValues[<?= $key ?>]" aria-invalid="false">
            <option value="">Выберите значение</option>
            <?php foreach ($value as $k => $v) : ?>

                <option value="<?= $k ?>"
                        <?php if (!empty($modelsValuesIds)) {?>
                            <?php if(in_array($k, $modelsValuesIds)) echo ' selected ';?>
                        <?php } ?>
                >
                    <?= "{$v}" ?>
                </option>

            <?php endforeach; ?>
        </select>

        <div><div class="help-block"></div></div>
    </div>
</div>
<?php endforeach; ?>

<?php } ?>


<?// debug($category_id); ?>



</div>


