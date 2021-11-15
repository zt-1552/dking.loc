<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class OneShopAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/styles/bootstrap4/bootstrap.min.css',
        '/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css',
        '/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
        '/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
        'plugins/jquery-ui-1.12.1.custom/jquery-ui.css',
        '/plugins/OwlCarousel2-2.2.1/animate.css',
        '/styles/shop_styles.css',
        '/styles/shop_responsive.css',
        '/styles/main.css',
    ];



    public $js = [
        '/js/jquery-3.3.1.min.js',
        '/styles/bootstrap4/popper.js',
        '/styles/bootstrap4/bootstrap.min.js',
//        '/plugins/greensock/TweenMax.min.js',
//        '/plugins/greensock/TimelineMax.min.js',
//        '/plugins/scrollmagic/ScrollMagic.min.js',
//        '/plugins/greensock/animation.gsap.min.js',
//        '/plugins/greensock/ScrollToPlugin.min.js',
//        '/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
//        '/plugins/slick-1.8.0/slick.js',
//        '/plugins/easing/easing.js',
        '/plugins/Isotope/isotope.pkgd.min.js',
        '/plugins/jquery-ui-1.12.1.custom/jquery-ui.js',
//        '/plugins/parallax-js-master/parallax.min.js',
        '/js/shop_custom.js',
        '/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}


