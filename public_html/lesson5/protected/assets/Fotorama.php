<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 17.01.2019
 * Time: 22:11
 */

namespace app\assets;

use yii\web\AssetBundle;

class Fotorama extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'js/fotorama/fotorama.css',
    ];

    public $js = [
        'js/fotorama/fotorama.js',
        'js/fotorama/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}