<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

?>
<!-- Header -->

<header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
        <div class="container">
            <?= \common\widgets\Alert::widget() ?>

            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 067 410 35 10</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:zt1552@gmail.com">zt1552@gmail.com</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                        </div>
                        <div class="top_bar_user">

                            <?php if (Yii::$app->user->isGuest) { ?>

                                <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                <div><a href="#register" data-toggle="modal" data-target="#login-modal">Регистрация</a></div>
                                <div><a href="#login" data-toggle="modal" data-target="#login-modal">Войти</a></div>

                            <?php } else { ?>
                                <div></div>
                                <div><?= Yii::$app->user->identity->username ?></div>
                                <div><a href="<?= Url::to(['auth/logout']); ?>">Выйти</a></div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="<?= \yii\helpers\Url::home()?>">OneTech</a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">

                                <form action="<?= Url::to(['category/search']); ?>" method="get" class="header_search_form clearfix">
                                    <input type="search" name="query" required="required" class="header_search_input" placeholder="Поиск товаров...">
                                    <div class="custom_dropdown">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc">All Categories</span>
                                            <i class="fas fa-chevron-down"></i>

                                            <ul class="custom_list clc">
                                                <li><a class="clc" href="#">All Categories</a></li>
                                                <li><a class="clc" href="#">Computers</a></li>
                                                <li><a class="clc" href="#">Laptops</a></li>
                                                <li><a class="clc" href="#">Cameras</a></li>
                                                <li><a class="clc" href="#">Hardware</a></li>
                                                <li><a class="clc" href="#">Smartphones</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                        <!-- Cart -->
                        <div class="cart">
                            <div id="cart_container" class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="images/cart.png" alt="">
                                    <div class="cart_count"><span class="cart-qty"><?= $_SESSION['cart.qty'] ?? '0'?></span></div>
                                </div>
                                <div  class="cart_content">
                                    <div class="cart_text"><a href="#" data-toggle="modal" data-target="#CartModal">Корзина</a></div>
                                    <div class="cart-sum">$ <?= $_SESSION['cart.sum'] ?? '0' ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <?= $this->render('/layouts/inc/menu1') ?>
                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="<?= Url::home()?>">Главная<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="<?= Url::to(['home/contact'])?>">Контакты<i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->

<!--    <div class="page_menu">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col">-->
<!---->
<!--                    <div class="page_menu_content">-->
<!---->
<!--                        <div class="page_menu_search">-->
<!--                            <form action="#">-->
<!--                                <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">-->
<!--                            </form>-->
<!--                        </div>-->
<!--                        <ul class="page_menu_nav">-->
<!--                            <li class="page_menu_item has-children">-->
<!--                                <a href="#">Language<i class="fa fa-angle-down"></i></a>-->
<!--                                <ul class="page_menu_selection">-->
<!--                                    <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="page_menu_item">-->
<!--                                <a href="#">Home<i class="fa fa-angle-down"></i></a>-->
<!--                            </li>-->
<!--                            <li class="page_menu_item has-children">-->
<!--                                <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>-->
<!--                                <ul class="page_menu_selection">-->
<!--                                    <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li class="page_menu_item has-children">-->
<!--                                        <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>-->
<!--                                        <ul class="page_menu_selection">-->
<!--                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="page_menu_item has-children">-->
<!--                                <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>-->
<!--                                <ul class="page_menu_selection">-->
<!--                                    <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="page_menu_item has-children">-->
<!--                                <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>-->
<!--                                <ul class="page_menu_selection">-->
<!--                                    <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>-->
<!--                            <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>-->
<!--                        </ul>-->
<!---->
<!--                        <div class="menu_contact">-->
<!--                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>-->
<!--                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

</header>
