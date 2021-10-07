<?php if(!empty($session['cart'])): ?>
<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div style="width: 100%;">
                <div class="cart_container">
                    <div class="cart_items">
                        <ul class="cart_list">

                            <?php foreach ($session['cart'] as $id => $item): ?>

                            <li class="cart_item clearfix">
                                <div class="cart_item_image"><?= \yii\helpers\Html::img($item['image'], ['alt' => $item['title']])?></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div class="cart_item_text"><?= $item['title']?></div>
                                    </div>
                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div class="cart_item_text"><?= $item['qty']?></div>
                                    </div>
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div class="cart_item_text"><?= $item['price']?></div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text"><?= $item['price'] * $item['qty'] ?></div>
                                    </div>
                                </div>
                            </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Order Total:</div>
                            <div class="order_total_amount">$2000</div>
                        </div>
                    </div>

                    <?php else:  ?>

                        <h3>Корзина пуста</h3>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>


