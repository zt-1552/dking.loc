<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/all.min.css',
        'css/adminlte.min.css'
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/adminlte.min.js',
        'js/admin.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
