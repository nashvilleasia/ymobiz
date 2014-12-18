[Back](/docs?page=ymocard-structure.md)


Ymocard Structure\Backoffice\Assets
==================================

```
backoffice
    assets
        AppAsset.php
```

Introduction
------------

How to create any assets with ***AssetBundle*** and register in your view.

For any doubts by customize and create assets, check docs from Yii 2.

Assets
------

```php
class AppAsset extends AssetBundle
{
    public $basePath = THEME_PATH;
    public $baseUrl = THEME_URL;
    public $css = ['css/site.css'];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
```

Register Assets
---------------

```
use backoffice\assets\AppAsset;

AppAsset::register($this);
```