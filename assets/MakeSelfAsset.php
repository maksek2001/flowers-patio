<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Ассет для "Собери сам"
 */
class MakeSelfAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/scroll.css',
        'css/site.css',
        'css/order.css'
    ];
    public $js = [
        'js/makeBouquet.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
