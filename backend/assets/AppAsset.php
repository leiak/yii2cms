<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        //'js/jquery.js', //会覆盖配置文件里的jquery但会位于系统加载的js之后造成错误
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    // public $jsOptions = [  //将jquery加载页面顶端 但是yii.js会在jquery之上 也会出现错误
    // 'position' => \yii\web\View::POS_HEAD
    // ];
}
