<?php

use frontend\widgets\LoginFormWidget;
use yii\helpers\Url;

?>
<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="<?= Url::home() ?>">OneTech</a></div>
                    </div>
                    <div class="footer_title">Есть вопросы? Звони нам 24/7</div>
                    <div class="footer_phone">+38 067 410 35 10</div>
                    <div class="footer_contact_text">
                        <p>ул. Трипольская, 13а, офис 105</p>
                        <p>г. Житомир, Украина</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Главные категории</div>
                    <ul class="footer_list">
                        <?php foreach (Yii::$app->params['main_categories'] as $main_category): ?>
                            <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $main_category['id']]) ?>"><?= $main_category['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Пользователям</div>
                    <ul class="footer_list">
                        <li><a href="<?= Url::to(['home/contact'])?>">Контакты</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright -->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal LOGIN -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#register" role="tab">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#login" role="tab">Авторизация</a>
                    </li>
                </ul>
            <div class="tab-content">

                <div class="tab-pane" id="register" role="tabpanel" aria-labelledby="list-home-list">

                    <div class="h2 mb-3 mt-2">Форма регистрации</div>

                    <div class="modal-footer">
                        <a href="<?= \yii\helpers\Url::to('cart/checkout')?>" class="btn btn-success">Регистрация</a>
                    </div>
                </div>
                <div class="tab-pane" id="login" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="h2 mb-3 mt-2">Форма авторизации</div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>


<!-- Modal CART -->
<div class="modal fade" id="CartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Корзина</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Продолжить покупки</button>
                <a href="<?= \yii\helpers\Url::to('cart/checkout')?>" class="btn btn-success">Оформить заказ</a>
                <button id="clean" type="button" class="btn btn-danger clean-cart">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>

