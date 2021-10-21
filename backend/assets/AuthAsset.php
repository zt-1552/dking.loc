<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/all.min.css',
        'css/adminlte.min.css',
        'css/icheck-bootstrap/icheck-bootstrap.min.css',
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/adminlte.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
