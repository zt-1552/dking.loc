<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'asset/css/vendor/vendor.min.css',
        'asset/css/plugins/plugins.min.css',
        'asset/css/style.min.css'
    ];
    public $js = [
        'asset/js/vendor/vendor.min.js',
        'asset/js/plugins/plugins.min.js',
        'asset/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
