<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html class="no-js" lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

     <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="main-wrapper main-wrapper-3">
    <header class="header-area section-padding-1 transparent-bar">
        <div class="header-large-device">
            <div class="header-bottom sticky-bar">
                <div class="container-fluid">
                    <div class="header-bottom-flex">
                        <div class="logo-menu-wrap">
                            <div class="logo">
                                <a href="<?= Url::home() ?>">
                                    <img src="assets/images/logo/logo-9.png" alt="logo">
                                </a>
                            </div>
                            <?= $this->render('/layouts/inc/menu') ?>
                        </div>
                        <div class="header-action-wrap header-action-flex header-action-width header-action-mrg-1">
                            <div class="search-style-1">
                                <form>
                                    <div class="form-search-1">
                                        <input class="input-text" value="" placeholder="Type to search (Ex: Phone, Laptop)" type="search">
                                        <button>
                                            <i class="icofont-search-1"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="same-style">
                                <a href="login-register.html"><i class="icofont-user-alt-3"></i></a>
                            </div>
                            <div class="same-style header-cart">
                                <a class="cart-active" href="index.html#"><i class="icofont-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-small-device header-small-ptb sticky-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo mobile-logo-width">
                            <a href="index.html">
                                <img alt="" src="assets/images/logo/logo-9.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-action-wrap header-action-flex header-action-mrg-1">
                            <div class="same-style header-cart">
                                <a class="cart-active" href="index.html#"><i class="icofont-shopping-cart"></i></a>
                            </div>
                            <div class="same-style header-info">
                                <button class="mobile-menu-button-active">
                                    <span class="info-width-1"></span>
                                    <span class="info-width-2"></span>
                                    <span class="info-width-3"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- mini cart start -->
    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="index.html#"><i class="icofont-close-line"></i></a>
            <div class="cart-content">
                <h3>Shopping Cart</h3>
                <ul>
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="index.html#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="index.html#">Awesome Mobile</a></h4>
                            <span> 1 × $49.00	</span>
                        </div>
                        <div class="cart-delete">
                            <a href="index.html#">×</a>
                        </div>
                    </li>
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="index.html#"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
                        </div>
                        <div class="cart-title">
                            <h4><a href="index.html#">Smart Watch</a></h4>
                            <span> 1 × $49.00	</span>
                        </div>
                        <div class="cart-delete">
                            <a href="index.html#">×</a>
                        </div>
                    </li>
                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span>$170.00</span></h4>
                </div>
                <div class="cart-checkout-btn">
                    <a class="btn-hover cart-btn-style" href="cart.html">view cart</a>
                    <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile menu start -->
    <div class="mobile-menu-active clickalbe-sidebar-wrapper-style-1">
        <div class="clickalbe-sidebar-wrap">
            <a class="sidebar-close"><i class="icofont-close-line"></i></a>
            <div class="mobile-menu-content-area sidebar-content-100-percent">
                <div class="mobile-search">
                    <form class="search-form" action="index.html#">
                        <input type="text" placeholder="Search here…">
                        <button class="button-search"><i class="icofont-search-1"></i></button>
                    </form>
                </div>
                <div class="clickable-mainmenu-wrap clickable-mainmenu-style1">
                    <nav>
                        <ul>
                            <li class="has-sub-menu"><a href="index.html#">Home</a>
                                <ul class="sub-menu-2">
                                    <li class="has-sub-menu"><a href="index.html#">Demo Group #01</a>
                                        <ul class="sub-menu-2">
                                            <li><a href="index.html">Home Multipurpose</a></li>
                                            <li><a href="index-megashop.html">Home Mega Shop</a></li>
                                            <li><a href="index-fashion.html">Home Fashion</a></li>
                                            <li><a href="index-fashion-2.html">Home Fashion 2 </a></li>
                                            <li><a href="index-automobile.html">Home Automobile</a></li>
                                            <li><a href="index-furniture.html">Home Furniture</a></li>
                                            <li><a href="index-electric.html">Home Electric</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub-menu"><a href="index.html#">Demo Group #02</a>
                                        <ul class="sub-menu-2">
                                            <li><a href="index-electric-2.html">Home Electric 2</a></li>
                                            <li><a href="index-handcraft.html">Home Hand Craft</a></li>
                                            <li><a href="index-book.html">Home Book</a></li>
                                            <li><a href="index-book-2.html">Home Book 2</a></li>
                                            <li><a href="index-cake.html">Home cake</a></li>
                                            <li><a href="index-organic.html">Home Organic</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub-menu"><a href="index.html#">Demo Group #03</a>
                                        <ul class="sub-menu-2">
                                            <li><a href="index-flower.html">Home Flower</a></li>
                                            <li><a href="index-treeplant.html">Home Tree plant</a></li>
                                            <li><a href="index-pet-food.html">Home Pet Food</a></li>
                                            <li><a href="index-kids.html">Home Kids</a></li>
                                            <li><a href="index-kids-2.html">Home Kids 2</a></li>
                                            <li><a href="index-kids-3.html">Home Kids 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub-menu"><a href="index.html#">shop</a>
                                <ul class="sub-menu-2">
                                    <li class="has-sub-menu"><a href="index.html#">Shop Layout</a>
                                        <ul class="sub-menu-2">
                                            <li><a href="shop.html">Shop Grid Style 1</a></li>
                                            <li><a href="shop-2.html">Shop Grid Style 2</a></li>
                                            <li><a href="shop-3.html">Shop Grid Style 3</a></li>
                                            <li><a href="shop-4.html">Shop Grid Style 4</a></li>
                                            <li><a href="shop-5.html">Shop Grid Style 5</a></li>
                                            <li><a href="shop-6.html">Shop Grid Style 6</a></li>
                                            <li><a href="shop-list.html">Shop List Style 1</a></li>
                                            <li><a href="shop-list-no-sidebar.html">Shop List Style 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub-menu"><a href="index.html#">Product Layout</a>
                                        <ul class="sub-menu-2">
                                            <li><a href="product-details.html">Product Layout 1</a></li>
                                            <li><a href="product-details-2.html">Product Layout 2</a></li>
                                            <li><a href="product-details-3.html">Product Layout 3</a></li>
                                            <li><a href="product-details-4.html">Product Layout 4</a></li>
                                            <li><a href="product-details-5.html">Product Layout 5</a></li>
                                            <li><a href="product-details-6.html">Product Layout 6</a></li>
                                            <li><a href="product-details-7.html">Product Layout 7</a></li>
                                            <li><a href="product-details-8.html">Product Layout 8</a></li>
                                            <li><a href="product-details-9.html">Product Layout 9</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub-menu"><a href="index.html#">Shop Page</a>
                                        <ul class="sub-menu-2">
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="checkout.html">Check Out</a></li>
                                            <li><a href="cart.html">Shopping Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="order-tracking.html">Order Tracking</a></li>
                                            <li><a href="compare.html">Compare</a></li>
                                            <li><a href="store.html">Store</a></li>
                                            <li><a href="empty-cart.html">Empty Cart</a></li>
                                            <li><a href="login-register.html">login / register</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub-menu"><a href="index.html#">Pages</a>
                                <ul class="sub-menu-2">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="contact-us-2.html">Contact Us 2</a></li>
                                    <li><a href="404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li><a href="shop.html">Collections</a></li>
                            <li class="has-sub-menu"><a href="index.html#">Blog</a>
                                <ul class="sub-menu-2">
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog-no-sidebar.html">Blog No sidebar</a></li>
                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-language-active" href="index.html#">Language <i class="icofont-simple-down"></i></a>
                        <div class="lang-curr-dropdown lang-dropdown-active">
                            <ul>
                                <li><a href="index.html#">English</a></li>
                                <li><a href="index.html#">Spanish</a></li>
                                <li><a href="index.html#">Hindi </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="aside-contact-info">
                    <ul>
                        <li><i class="icofont-clock-time"></i>Monday - Friday: 9:00 - 19:00</li>
                        <li><i class="icofont-envelope"></i>Info@example.com</li>
                        <li><i class="icofont-stock-mobile"></i>(+55) 254. 254. 254</li>
                        <li><i class="icofont-home"></i>Helios Tower 75 Tam Trinh Hoang - Ha Noi - Viet Nam</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?= $content ?>

    <footer class="footer-area pt-130">
        <div class="footer-top pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-title">Product</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="index.html#">Coats</a></li>
                                    <li><a href="index.html#">Dresses</a></li>
                                    <li><a href="index.html#">Hoodies & Sweatshirts</a></li>
                                    <li><a href="index.html#">Infant & Toddlers Clothing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-title">Information</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="index.html#">FAQ</a></li>
                                    <li><a href="index.html#">Help</a></li>
                                    <li><a href="index.html#">Shipping & Return</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-title">Socials</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="index.html#">Instagram</a></li>
                                    <li><a href="index.html#">Twitter</a></li>
                                    <li><a href="index.html#">Facebook</a></li>
                                    <li><a href="index.html#">Pinterest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-title">Subscribe to get offer!</h3>
                            <div class="subscribe-wrap">
                                <div id="mc_embed_signup" class="subscribe-form">
                                    <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input class="email" type="email" required="" placeholder="Your email" name="EMAIL" value="">
                                            <div class="mc-news" aria-hidden="true">
                                                <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                            </div>
                                            <div class="clear">
                                                <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <p>We’ll never share your email address with a third-party.</p>
                            </div>
                            <div class="app-google-store">
                                <a href="index.html#"><img src="assets/images/icon-img/app-store.png" alt=""></a>
                                <a href="index.html#"><img src="assets/images/icon-img/google-play.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom border-top-1">
            <div class="container">
                <div class="copyright copyright-ptb text-center">
                    <p>Copyright © 2020 Dking - <a target="_blank" href="https://hasthemes.com/"> All Right Reserved</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-12 col-sm-6">
                            <div class="quickview-img">
                                <img src="assets/images/product/product-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-12 col-sm-6">
                            <div class="product-details-content quickview-content">
                                <h2>Electronic Shop</h2>
                                <div class="product-ratting-review-wrap">
                                    <div class="product-ratting-digit-wrap">
                                        <div class="product-ratting">
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                        <div class="product-digit">
                                            <span>4.0</span>
                                        </div>
                                    </div>
                                    <div class="product-review-order">
                                        <span>62 Reviews</span>
                                        <span>242 orders</span>
                                    </div>
                                </div>
                                <p>Seamlessly predominate enterprise metrics without performance based process improvements.</p>
                                <div class="pro-details-price">
                                    <span>US $75.72</span>
                                    <span class="old-price">US $95.72</span>
                                </div>
                                <div class="pro-details-color-wrap">
                                    <span>Color:</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li><a class="white" href="index.html#">Black</a></li>
                                            <li><a class="azalea" href="index.html#">Blue</a></li>
                                            <li><a class="dolly" href="index.html#">Green</a></li>
                                            <li><a class="peach-orange" href="index.html#">Orange</a></li>
                                            <li><a class="mona-lisa active" href="index.html#">Pink</a></li>
                                            <li><a class="cupid" href="index.html#">gray</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size:</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="index.html#">XS</a></li>
                                            <li><a href="index.html#">S</a></li>
                                            <li><a href="index.html#">M</a></li>
                                            <li><a href="index.html#">L</a></li>
                                            <li><a href="index.html#">XL</a></li>
                                            <li><a href="index.html#">XXL</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <span>Quantity:</span>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                    </div>
                                </div>
                                <div class="product-details-meta">
                                    <ul>
                                        <li><span>Model:</span> <a href="index.html#">Odsy-1000</a></li>
                                        <li><span>Ship To</span> <a href="index.html#">2834 Laurel Lane</a>, <a href="index.html#">Mentone</a> , <a href="index.html#">Texas</a></li>
                                    </ul>
                                </div>
                                <div class="pro-details-action-wrap">
                                    <div class="pro-details-buy-now">
                                        <a href="index.html#">Buy Now</a>
                                    </div>
                                    <div class="pro-details-action">
                                        <a title="Add to Cart" href="index.html#"><i class="icon-basket"></i></a>
                                        <a title="Add to Wishlist" href="index.html#"><i class="icon-heart"></i></a>
                                        <a class="social" title="Social" href="index.html#"><i class="icon-share"></i></a>
                                        <div class="product-dec-social">
                                            <a class="facebook" title="Facebook" href="index.html#"><i class="icon-social-facebook-square"></i></a>
                                            <a class="twitter" title="Twitter" href="index.html#"><i class="icon-social-twitter"></i></a>
                                            <a class="instagram" title="Instagram" href="index.html#"><i class="icon-social-instagram"></i></a>
                                            <a class="pinterest" title="Pinterest" href="index.html#"><i class="icon-social-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
</div>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
