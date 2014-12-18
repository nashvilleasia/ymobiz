<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-widgets
 * @version 1.0.0
 */

namespace ymobiz\extensions\kartik\widgets;

/**
 * Asset bundle for \kartik\widgets\Growl
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class GrowlAsset extends AssetBundle
{
    public function init()
    {
        $this->setSourcePath('@kartik/../yii2-widgets/assets/');
        $this->setupAssets('css', ['css/growl']);
        $this->setupAssets('js', ['js/bootstrap-growl']);
        parent::init();
    }
}
