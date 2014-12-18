<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-detail-view
 * @version 1.0.0
 */

namespace ymobiz\components;

use Yii;
use kartik\detail\DetailViewAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class DetailView extends \kartik\detail\DetailView
{
    /**
     * Register assets
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        DetailViewAsset::register($view);
        if ($this->enableEditMode) {
            $options = ['mode' => $this->mode];
            // $view->registerJs('$("#' . $this->container['id'] . '").kvDetailView(' . Json::encode($options) . ');');
        }
    }

    /**
     * Gets the default button
     *
     * @param string $type the button type
     * @return string
     */
    protected function getDefaultButton($type, $label, $title, $options)
    {
        $btnStyle = empty($this->panel['type']) ? self::TYPE_DEFAULT : $this->panel['type'];
        $label = ArrayHelper::remove($options, 'label', $label);
        if (empty($options['class'])) {
            $options['class'] = 'btn btn-xs btn-' . $btnStyle;
        }
        Html::addCssClass($options, 'kv-btn-' . $type);
        $options += ['title' => Yii::t('kvdetail', $title)];
        if ($type !== 'delete' && $type !== 'save' && $type !== 'update') {
            $options['type'] = 'button';
            return Html::button($label, $options);
        } elseif ($type === 'delete') {
            $url = ArrayHelper::remove($options, 'url', '#');
            $options += [
                'data-method' => 'post',
                'data-confirm' => Yii::t('kvdetail', 'Are you sure you want to delete this item?')
            ];
            return Html::a($label, $url, $options);
        } elseif ($type === 'update') {
            $url = ArrayHelper::getValue($options, 'url');
            return Html::a($label, $url, $options);
        } else {
            return Html::submitButton($label, $options);
        }
    }
}