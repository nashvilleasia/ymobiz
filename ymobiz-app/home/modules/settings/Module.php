<?php

namespace home\modules\settings;

use yii\filters\AccessControl;
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'home\modules\settings\controllers';

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
        \Yii::$app->i18n->translations['modules/settings/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/modules/settings/messages',
            'fileMap' => [
                'modules/settings/app' => 'app.php',
                'modules/settings/error' => 'error.php',
                'modules/settings/common' => 'common.php',
                'modules/settings/form' => 'form.php',
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

            /*Auth Components*/
            'ymoCheckUser' => [
                'class' => 'ymobiz\components\UserCheckPermission'
            ],

            /*From Yii Application and others extra classes*/
            'assetManager' => [
                'class' => 'yii\web\AssetManager',
                'bundles' => [
                    'home\assets\NetworkAsset' => [
                        'css' => [
                            'css/styles-ymobiz.css',
                            'css/settings-ymobiz.css',
                        ],
                    	'js' => [
                    		'js/main.js',
                    	]	
                    ],
                ],
            ],
        ];
    }
}
