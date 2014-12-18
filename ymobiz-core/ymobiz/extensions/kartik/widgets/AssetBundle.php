<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-widgets
 * @version 1.0.0
 */

namespace ymobiz\extensions\kartik\widgets;

/**
 * Base asset bundle for all widgets
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class AssetBundle extends \kartik\widgets\AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
