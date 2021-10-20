    <!-- Product Item -->
    <div class="product_item is_new">
        <div class="product_border"></div>
        <div class="product_image d-flex flex-column align-items-center justify-content-center"><?= \yii\helpers\Html::img("{$model->image}", ['alt' => $model->title]) ?></div>
        <div class="product_content">
            <div class="product_price">$<?= $model->price ?></div>
            <div class="product_name"><div><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $model->id]) ?>" tabindex="0"><?= $model->title ?></a></div></div>
        </div>
        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $model->id])?>" data-id="<?= $model->id ?>" class="add_to_cart btn btn-light btn-sm">Купить</a>
        <div class="product_fav"><i class="fas fa-heart"></i></div>
        <ul class="product_marks">
            <?= ($model->is_offer === 1) ? '<li class="product_mark product_discount">Sale</li>' : ''; ?>
            <!--                                <li class="product_mark product_new">new</li>-->
        </ul>
    </div>

