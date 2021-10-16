<?php

$this->params['breadcrumbs'][] = [
    'label' => 'Оформление заказа', // название ссылки
];

?>


<div class="container">

    <?= $this->render('../inc/breadcrumbs')?>

    <!-- //products-breadcrumb -->

    <h2 class="m-5">Оформление заказа</h2>

    <?= \common\widgets\Alert::widget() ?>

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


    <div class="row">
        <div class="col-md-6 mb-5 mt-5">
            <h3>Данные покупателя</h3>
            <?php $form = \yii\widgets\ActiveForm::begin() ?>
                <?= $form->field($formOrders, 'name') ?>
                <?= $form->field($formOrders, 'email') ?>
                <?= $form->field($formOrders, 'address') ?>
<!--                --><?//= $form->field($formOrders, 'tel') ?>
                <?= $form->field($formOrders, 'comment')->textarea(['rows' => 5]) ?>
                <?= \yii\helpers\Html::submitButton('Заказать', [
                    'class' => 'btn btn-success m-2'
                ]) ?>
            <?php $form = \yii\widgets\ActiveForm::end() ?>
        </div>
    </div>
</div>