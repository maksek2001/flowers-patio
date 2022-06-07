<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Основной ассет
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/scroll.css',
        'https://www.w3schools.com/w3css/4/w3.css',
        'css/site.css',
        'css/animateImage.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
