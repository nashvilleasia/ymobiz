<?php

namespace home\modules\marketing\controllers;

use Yii;
use yii\web\Controller;
use ymobiz\components\ymoLangManager;

class DefaultController extends Controller
{

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
		\Yii::$app->language = (ymoLangManager::getLang()) ? ymoLangManager::getLang() : 'english';
		\Yii::$app->assetManager->bundles = Yii::$app->getModule('marketing')->components['assetManager']['bundles'];
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}
	
	public function actionIndex()
	{
        \Yii::$app->view->title = "YMOBIZ - My Mobile Business";
		return $this->render('index');
	}

    public function actionPageExample()
    {
        $page = $this->renderPartial('pages/page-example');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCrmInfo()
    {
        $page = $this->renderPartial('pages/crm-info');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

	public function actionCrmNotes()
	{
		$page = $this->renderPartial('pages/crm-notes');
		return $this->render('page',[
			"page"=>$page
		]);
	}

    public function actionCrmTasks()
    {
        $page = $this->renderPartial('pages/crm-tasks');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

	public function actionCrmContactMail()
	{
		$page = $this->renderPartial('pages/crm-contact-mail');
		return $this->render('page',[
			"page"=>$page
		]);
	}

    public function actionCrmReadMail()
    {
        $page = $this->renderPartial('pages/crm-read-mail');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCrmNewMail()
    {
        $page = $this->renderPartial('pages/crm-new-mail');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCrmFolders()
    {
        $page = $this->renderPartial('pages/crm-folders');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCrmContactVoip()
    {
        $page = $this->renderPartial('pages/crm-contact-voip');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCrmContactChat()
    {
        $page = $this->renderPartial('pages/crm-contact-chat');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

	public function actionCrmSidebarContact()
	{
		$page = $this->renderPartial('pages/crm-sidebar-contact');
		return $this->render('page',[
			"page"=>$page
		]);
	}

    public function actionCrmSidebarLeads()
    {
        $page = $this->renderPartial('pages/crm-sidebar-leads');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

	public function actionCrmSubmenut()
	{
		$page = $this->renderPartial('pages/crm-submenu');
		return $this->render('page',[
			"page"=>$page
		]);
	}

	public function actionScheduleSidebar()
	{
		$page = $this->renderPartial('pages/schedule-sidebar');
		return $this->render('page',[
			"page"=>$page
		]);
	}

    public function actionScheduleSidebarDay()
    {
        $page = $this->renderPartial('pages/schedule-sidebar-day');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionScheduleCalendar()
    {
        $page = $this->renderPartial('pages/schedule-calendar');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionScheduleCalendarWeek()
    {
        $page = $this->renderPartial('pages/schedule-calendar-week');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionAdvertisingCampaigns()
    {
        $page = $this->renderPartial('pages/advertising-campaigns');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaigns()
    {
        $page = $this->renderPartial('pages/campaigns');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaignsMenu()
    {
        $page = $this->renderPartial('pages/campaigns-menu');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaignsSidebarBudget()
    {
        $page = $this->renderPartial('pages/campaigns-sidebar');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaignsStatistics()
    {
        $page = $this->renderPartial('pages/campaigns-statistics');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaignsChart()
    {
        $page = $this->renderPartial('pages/campaigns-chart');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaignsTarget()
    {
        $page = $this->renderPartial('pages/campaigns-target');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaignsInfo()
    {
        $page = $this->renderPartial('pages/campaigns-info');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionCampaignsPreview()
    {
        $page = $this->renderPartial('pages/campaigns-preview');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSms()
    {
        $page = $this->renderPartial('pages/sms');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionAdvertisingSms()
    {
        $page = $this->renderPartial('pages/advertising-sms');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSmsSidebar()
    {
        $page = $this->renderPartial('pages/sms-sidebar');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSmseMenu()
    {
        $page = $this->renderPartial('pages/sms-menu');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSmsTarget()
    {
        $page = $this->renderPartial('pages/sms-target');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionSmsInfo()
    {
        $page = $this->renderPartial('pages/sms-info');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionPopups($source)
    {
        $this->layout="main";

        if($source==FALSE)
            $source='error';
        else
            $source='popups/'.$source;
        return $this->render($source);
    }

    public function actionError()
    {
        if (\Yii::$app->exception !== null) {
            return $this->render('error', ['exception' => \Yii::$app->exception]);
        }
    }
}
