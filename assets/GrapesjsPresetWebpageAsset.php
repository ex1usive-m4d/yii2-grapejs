<?php

namespace chejam\yii2grapesjs\assets;


use yii\web\AssetBundle;

/**
 * Class GrapesjsPresetWebpageAsset
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package chejam\yii2grapesjs\assets
 */
class GrapesjsPresetWebpageAsset extends AssetBundle
{
    public $sourcePath = '@vendor/chejam/yii2-grapesjs/asset/grapesjs-preset-webpage';

    public $css = [
        'https://grapesjs.com/stylesheets/grapesjs-preset-webpage.min.css'
    ];

    public $js = [
        'https://grapesjs.com/js/grapesjs-preset-webpage.min.js?v0.1.11'
    ];
}
