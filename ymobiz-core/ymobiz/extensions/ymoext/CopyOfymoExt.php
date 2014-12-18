<?php
/**
 * Created by PhpStorm.
 * User: camello
 * Date: 7/12/14
 * Time: 2:04 PM
 */

namespace ymoext;

use yii\base\Component;
use mcms\ajaxform\AjaxFormAsset;
use yii\base\ErrorException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class ymoExt extends Widget
{
    protected $_view;

    public $name = 'button';
    public $url = null;

    public $plugin = false;
    public $pluginOptions = [];

    public $buttonType = null;
    public $customButton = false;

    public $options = [
        'href' => '#',
        'class'=>'btn btn-primary',
    ];

    public $ajaxButtonAction = 'click';
    public $ajaxSelector = 'body';
    public $ajaxEvents = 'event';

    public function init()
    {
        parent::init();
        $this->_view = \Yii::$app->getView();
        $this->registerAssets();
    }

    public function run()
    {
        if($this->plugin==false){
            throw new ErrorException(\Yii::t('yii', 'The plugin is not configured'));
        }else{
            $plugin = $this->plugin;
            $this->actionButton();
            $this->htmlButton();
            return $this->$plugin($this->pluginOptions);
        }
    }

    public function ajaxSession($options=false)
    {
        $options = ($this->pluginOptions==false) ? $options : $this->pluginOptions;
        //return VarDumper::dump($options);
    }

    public function htmlButton()
    {
        if($this->buttonType==null){
            echo \yii\helpers\Html::a($this->name,$this->url,ArrayHelper::merge($this->options,$this->defaultOptions()));
        }else{
            return $this->customButton;
        }
    }

    public function actionButton()
    {
        $view = $this->_view;
        $view->registerJs("jQuery(document).on('$this->ajaxButtonAction','#$this->id',function($this->ajaxEvents){
            event.preventDefault();
            console.log(this);
        });
        ");
    }

    public function defaultOptions()
    {
        return [
            'id' => $this->id,
        ];
    }

    public function registerAssets()
    {
        AjaxFormAsset::register($this->_view);
    }
}