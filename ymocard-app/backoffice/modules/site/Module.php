<?php

namespace backoffice\modules\site;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * @inheritdoc
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backoffice\modules\site\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    /**
     * @inheritdoc
     */
    public function __construct($id, $parent = null, $config = [])
    {
        foreach ($this->getModuleComponents() as $name => $component) {
            if (!isset($config['components'][$name])) {
                $config['components'][$name] = $component;
            } elseif (is_array($config['components'][$name]) && !isset($config['components'][$name]['class'])) {
                $config['components'][$name]['class'] = $component['class'];
            }
        }
        parent::__construct($id, $parent, $config);
    }

    /**
     * @inheritdoc
     */
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['modules/site/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/modules/site/messages',
            'fileMap' => [
                'modules/site/common' => 'common.php',
                'modules/site/form' => 'form.php',
            ],
        ];
    }

    /**
     * Returns module components.
     * @return array
     */
    protected function getModuleComponents()
    {
        return [
            /*Home Components*/
            'ymoTools' => [
                'class' => 'ymobiz\components\ymoTools',
            ],
            'ymoTranslate' => [
                'class' => 'ymobiz\components\ymoTranslate',
            ],
            'ymoLangManager' => [
                'class' => 'ymobiz\components\ymoLangManager',
            ],
            'ymoMenu' => [
                'class' => 'ymobiz\components\ymoMenu',
            ],

            /*Common Components*/
            'ymoLanguages' => [
                'class' => 'ymobiz\models\common\ymoLanguages',
            ],
            'ymoLoginForm' => [
                'class' => 'ymobiz\activeforms\ymoLoginForm'
            ],
            'ymoAccessMenu' => [
                'class' => 'ymocardapp\common\components\ymoAccessMenu'
            ],

            /*Auth Components*/
            'ymoCheckUser' => [
                'class' => 'ymobiz\components\UserCheckPermission'
            ],

            /*From Yii Application and others extra classes*/
            'assetManager' => [
                'class' => 'yii\web\AssetManager',
                'bundles' => [
                    'manager\assets\AppAsset' => [
                        'css' => [
                            'css/site.css',
                        ]
                    ],
                ],
            ],
        ];
    }
}
