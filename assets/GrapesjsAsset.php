<?php

namespace chejam\yii2grapesjs\assets;


use yii\web\AssetBundle;

/**
 * Class GrapesjsAsset
 *
 * @package chejam\yii2grapesjs\assets
 */
class GrapesjsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/chejam/yii2-grapesjs/asset/grapesjs';

    public $css = [
        'css/grapes.min.css'
    ];

    public $js = [
        'grapes.min.js'
    ];
}
