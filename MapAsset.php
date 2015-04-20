<?php

namespace jomonkj\GooglePlace;

use yii\web\AssetBundle;

class MapAsset extends AssetBundle {

    public $basePath = '@vendor\jomonkj\asset';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/create-place.js',
    ];
    public $depends = [
        'frontend\assets\AppAsset'
    ];

}
