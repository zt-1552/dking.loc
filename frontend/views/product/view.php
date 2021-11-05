<?php

$attrValProduct = [];
if(!empty($attributeValues && !empty($category->attributes0))){
    foreach ($category->attributes0 as $attribute){
        foreach ($attributeValues as $attributeValue){
            if($attributeValue->values->attributes_id == $attribute->id){
                $attrValProduct[$attribute->title] = $attributeValue->values->value;
            }
        }
    }
}

//debug($attrValProduct);

?>


<!-- Single Product -->

<div class="single_product">

    <?= $this->render('../inc/breadcrumbs')?>

    <div class="container">

        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="<?= $product->image ?>"><?= \yii\helpers\Html::img("{$product->image}", ['alt' => "{$product->title}"]) ?></li>
                    <li data-image="images/single_3.jpg"><?= \yii\helpers\Html::img("{$product->image}", ['alt' => "{$product->title}"]) ?></li>
                    <li data-image="images/single_3.jpg"><?= \yii\helpers\Html::img("{$product->image}", ['alt' => "{$product->title}"]) ?></li>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><?= \yii\helpers\Html::img("{$product->image}", ['alt' => "{$product->title}"]) ?></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category"><?= $category->name ?></div>
                    <div class="product_name"><?= $product->title ?></div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text"><?= $product->content ?></div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
<!--                                <div class="product_quantity clearfix">-->
<!--                                    <span>Quantity: </span>-->
<!--                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">-->
<!--                                    <div class="quantity_buttons">-->
<!--                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>-->
<!--                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>-->
<!--                                    </div>-->
<!--                                </div>-->

                            </div>

                            <div class="product_price">$<?= $product->price ?></div>
                            <div class="button_container">
                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id ?>" class="add_to_cart button cart_button">Купить</a>
                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if (!empty($attrValProduct)){ ?>
    <div class="container">
        <div class="row">
            <div class="mx-auto">
                <h3 class="h3 mb-3 p-3 bg-secondary">Характеристики <?= $product->title ?> </h3>
                <table class="table mt-2">
                    <tbody>
                    <?php foreach ($attrValProduct as $key => $value): ?>
                        <tr>
                            <th scope="row"><?= $key ?></th>
                            <td><?= $value ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
<?php } ?>
