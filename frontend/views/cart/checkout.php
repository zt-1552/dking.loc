<?php

$this->params['breadcrumbs'][] = [
    'label' => 'Оформление заказа', // название ссылки
];

?>


<div class="container">

    <?= $this->render('../inc/breadcrumbs')?>

    <!-- //products-breadcrumb -->

    <h2 class="m-5">Оформление заказа</h2>

    <?php if(!empty($session['cart'])): ?>

    <div class="row">
        <h3>В вашей корзине: <span><?= $session['cart.qty'] ?> товаров</span></h3>
        <table class="table table-bordered align-middle mb-0">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Фото</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Наименование / Цена</th>
                <th scope="col">Сумма</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $i = 0;
            foreach ($session['cart'] as $id => $item): ?>

            <tr class="rem<?= ++$i ?> align-middle>">
                <td class="align-middle"><?= $i ?></td>
                <td class="invert-image align-middle"><?= \yii\helpers\Html::img($item['image'], ['alt' => $item['title'], 'height' => 70])?></td>
                <td class="align-middle">
                    <button id="change-qty" type="button" class="btn btn-outline-info change-qty" data-id="<?= $id ?>" data-qty="-1">-</button>
                    <span class="p-2 m-1"><?= $item['qty']?></span>
                    <button id="change-qty" type="button" class="btn btn-outline-info change-qty" data-id="<?= $id ?>" data-qty="1">+</button>
                </td>
                <td class="align-middle"><?= $item['title']?> / $<?= $item['price']?></td>
                <td class="align-middle">$ <?= $item['price'] * $item['qty'] ?></td>
                <td class="align-middle">
                    <div class="d-flex justify-content-center align-items-stretch">
                        <button type="button" class="close del-item-cart" data-id="<?= $id ?>">
                            <a href="<?= \yii\helpers\Url::to(['cart/del-item', 'id' => $id]) ?>"><span aria-hidden="true" class="text-center">&times;</span></a>
                        </button>
                    </div>
                 </td>
            </tr>

            <?php endforeach; ?>

            </tbody>
        </table>
        <div class="mb-2 p-3 w-100 text-end bg-info">
            <p class="h4 text-end">Общая сумма - $<?= $session['cart.sum'] ?></p>
        </div>
    </div>
    <?php else:  ?>

        <h3 class="p-3 mb-5 bg-primary text-center">Корзина пуста</h3>

    <?php endif; ?>


    <div class="checkout-left">
        <div class="col-md-8 address_form_agile">
            <h4>Add a new Details</h4>
            <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                    <div class="information-wrapper">
                        <div class="first-row form-group">
                            <div class="controls">
                                <label class="control-label">Full name: </label>
                                <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                            </div>
                            <div class="w3_agileits_card_number_grids">
                                <div class="w3_agileits_card_number_grid_left">
                                    <div class="controls">
                                        <label class="control-label">Mobile number:</label>
                                        <input class="form-control" type="text" placeholder="Mobile number">
                                    </div>
                                </div>
                                <div class="w3_agileits_card_number_grid_right">
                                    <div class="controls">
                                        <label class="control-label">Landmark: </label>
                                        <input class="form-control" type="text" placeholder="Landmark">
                                    </div>
                                </div>
                                <div class="clear"> </div>
                            </div>
                            <div class="controls">
                                <label class="control-label">Town/City: </label>
                                <input class="form-control" type="text" placeholder="Town/City">
                            </div>
                            <div class="controls">
                                <label class="control-label">Address type: </label>
                                <select class="form-control option-w3ls">
                                    <option>Office</option>
                                    <option>Home</option>
                                    <option>Commercial</option>

                                </select>
                            </div>
                        </div>
                        <button class="submit check_out">Delivery to this Address</button>
                    </div>
                </section>
            </form>
            <div class="checkout-right-basket">
                <a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
            </div>
        </div>
    </div>
</div>