<?php

namespace home\modules\admin\modules\supervisor;
use yii\filters\AccessControl;

/**
 * @inheritdoc
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'home\modules\admin\modules\supervisor\controllers';

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
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
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
        \Yii::$app->i18n->translations['modules/admin/modules/supervisor*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/modules/admin/modules/supervisor/messages',
            'fileMap' => [
                'modules/admin/modules/supervisor/common' => 'common.php',
                'modules/admin/modules/supervisor/form' => 'form.php',
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
            'assetManager' => [
                'class' => 'yii\web\AssetManager',
                'bundles' => [
                    'home\assets\AppAsset' => [
                        'css' => [
                            'css/styles-ymocard.css',
                            'css/admin-ymocard.css',
                        ]
                    ],
                ],
            ],
        ];
    }
}
