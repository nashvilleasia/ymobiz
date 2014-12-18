MCMS Ajax Form
==============
Ajax form with malsup jquery-form

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist marciocamello/yii2-mcms-ajax-form "*"
```

or add

```
"marciocamello/yii2-mcms-ajax-form": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php

<?php
  $form = \mcms\ajaxform\AjaxActiveForm::begin([
					'id' => 'register-form',
					'options'=>[
						'enctype'=>'multipart/form-data'
					],
					'modal' => true,
					'modalOptions' => [
						'header' => false,
					],
					'pluginOptions' => [
						'resetForm' => false,
					],
				]);
?>

Your form objects here.
				
<?php \mcms\ajaxform\AjaxActiveForm::end();?>
```
