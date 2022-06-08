<?php

namespace app\assets;

use yii\web\AssetBundle;

class PurchaseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/purchase.css',
    ];

    public $js = [
        'js/purchase.js'
    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
