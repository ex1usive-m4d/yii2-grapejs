<?php

namespace chejam\yii2grapesjs\widgets;


use chejam\yii2grapesjs\assets\GrapesjsAsset;
use chejam\yii2grapesjs\assets\GrapesjsPresetWebpageAsset;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class GrapesjsWidget
 *
 * @package chejam\yii2grapesjs\widgets
 */
class GrapesjsWidget extends Widget
{
    public $options = [];
    public $clientOptions = [];
    public $events = null;

    /**
     * Custom placeholder variables, which will be added inside richtext editor
     *
     * @var array
     */
    public $variables = [];

    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    public function run()
    {
        $this->registerPlugin();

        return Html::tag('div', '', $this->options);
    }

    protected function registerPlugin()
    {
        $view = $this->getView();
        GrapesjsAsset::register($view);
        GrapesjsPresetWebpageAsset::register($view);
        $id = $this->options['id'];

        if ($this->clientOptions !== false) {
            $clientOptions = Json::htmlEncode(array_merge_recursive([
                'container' => "#$id",
                'fromElement' => true,
                'plugins' => ['gjs-preset-webpage'],
                'blockManager' => [
                    'appendTo' =>'#blocks',
                ],
                'storageManager' => [
                    'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
                ],
                'assetManager' => [
                    'assets' => [
                        'http://placehold.it/350x250/78c5d6/fff/image1.jpg',
                        [
                            'type' => 'image',
                            'src' => 'http://placehold.it/350x250/459ba8/fff/image2.jpg',
                            'height' => 350,
                            'width' => 250
                        ],
                    ],
                    'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
                ]
            ], $this->clientOptions));

            $js = "var editor = grapesjs.init($clientOptions);";

            if (!empty($this->events)) {
                foreach ($this->events as $name => $callback) {
                    $js .= "editor.on('$name', $callback);";
                }
            }
            $view->registerJs("(function(){
                $js
            })();");
        }
    }
}
