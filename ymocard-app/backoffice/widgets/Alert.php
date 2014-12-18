<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backoffice\widgets;

use kartik\widgets\AlertBlock;
use kartik\widgets\Growl;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * - \Yii::$app->getSession()->setFlash('error', 'This is the message');
 * - \Yii::$app->getSession()->setFlash('success', 'This is the message');
 * - \Yii::$app->getSession()->setFlash('info', 'This is the message');
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class Alert extends \yii\bootstrap\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $alertTypes = [
        'error'   => Growl::TYPE_DANGER,
        'danger'  => Growl::TYPE_DANGER,
        'success' => Growl::TYPE_SUCCESS,
        'info'    => Growl::TYPE_INFO,
        'warning' => Growl::TYPE_WARNING
    ];

    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];

    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $message) {
            if (isset($this->alertTypes[$type])) {

				return \Yii::$app->view->render('//errors/alert',[
					'type' => 'growl',
					'options' => [
						'type' => $this->alertTypes[$type],
						'title' => \Yii::t('app','Well done!'),
						'body' => $message,
						'showSeparator' => true,
						'delay' => 0,
						'pluginOptions' => [
							'position' => [
								'from' => 'top',
								'align' => 'right',
							]
						]
					]
				]);

                $session->removeFlash($type);
            }
        }
    }
}
