<?php

namespace ymobiz\components;


class Request extends \yii\web\Request {

    public $web;
    public $baseUrl = false;
    public $adminUrl = false;
    public $cookieValidationKey = 'abcdefghijlkmnopqrstuwvxyz1234567890';

    public function getBaseUrl(){
        if($this->adminUrl==false){
            return str_replace($this->web, "", parent::getBaseUrl()) . $this->baseUrl;
        }else{
            return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
        }
    }

    public function resolvePathInfo(){
        if($this->getUrl() === $this->adminUrl || $this->getUrl() === $this->baseUrl){
            return "";
        }else{
            return parent::resolvePathInfo();
        }
    }
}