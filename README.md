Grapesjs AssetBundle and widget
================================
Grapesjs AssetBundle, widget

Installation
------------

add

```
"chejam/yii2-grapesjs": "^v0.1.0"
```

to the require section of your `composer.json` file.

Configuring Widget
------------------------

Display the widget in your view file.

```php
<?php echo \chejam\yii2grapesjs\widgets\GrapesjsWidget::widget([
    ['options' => ['id' => 'gjs'],
    'clientOptions' => [
        'storageManager' => [
            'type' => 'remote',
            'stepsBeforeSave' => 1,
            'urlStore' => "/lp/visual/save"
        ],
        'deviceManager' => false
    ],
    'events' => [
        'storage:end' => 'function(params) {
               console.log(params);
        }',
    ]
]) ?>
```

Add the following actions to your controller or customize your action from urlStore.

```php
public function actions()
{
    return array_merge(parent::actions(), [
        'get' => [
            'class' => \chejam\yii2grapesjs\actions\GetAction::class,
            // If includeFields is presented `excludeFields` are not considered
            // 'includeFields' => ['css', 'html'],
            // Exclude assets column from returned fields of the Content model
            'excludeFields' => ['assets']
        ],
        'save' => \chejam\yii2grapesjs\actions\SaveAction::class,
        'upload' => \chejam\yii2grapesjs\actions\UploadAction::class
    ]);
}
```

