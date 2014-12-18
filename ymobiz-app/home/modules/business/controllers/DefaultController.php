<?php

namespace home\modules\business\controllers;

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
		\Yii::$app->assetManager->bundles = Yii::$app->getModule('business')->components['assetManager']['bundles'];
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

    public function actionOperationInvoices()
    {
        $page = $this->renderPartial('pages/operation-invoices');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionOperationMenu()
    {
        $page = $this->renderPartial('pages/operation-menu');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionInvoicesEdit()
    {
        $page = $this->renderPartial('pages/invoices-edit');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionInvoicesSidebar()
    {
        $page = $this->renderPartial('pages/invoices-sidebar');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionInvoicesMenu()
    {
        $page = $this->renderPartial('pages/invoices-menu');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionInvoicesTable()
    {
        $page = $this->renderPartial('pages/invoices-table');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionInvoicesArticles()
    {
        $page = $this->renderPartial('pages/invoices-articles');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionInvoicesOptions()
    {
        $page = $this->renderPartial('pages/invoices-options');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionOperationArticles()
    {
        $page = $this->renderPartial('pages/operation-articles');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionArticlesTable()
    {
        $page = $this->renderPartial('pages/articles-table');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionArticlesMenu()
    {
        $page = $this->renderPartial('pages/articles-menu');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionArticlesSidebar()
    {
        $page = $this->renderPartial('pages/articles-sidebar');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionArticlesImage()
    {
        $page = $this->renderPartial('pages/articles-image');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionArticlesPromotions()
    {
        $page = $this->renderPartial('pages/articles-promotions');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionArticlesPreview()
    {
        $page = $this->renderPartial('pages/articles-preview');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionOperationYmocash()
    {
        $page = $this->renderPartial('pages/operation-ymocash');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceReceivables()
    {
        $page = $this->renderPartial('pages/finance-receivables');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceMenu()
    {
        $page = $this->renderPartial('pages/finance-menu');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinancePayables()
    {
        $page = $this->renderPartial('pages/finance-payables');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceExpenses()
    {
        $page = $this->renderPartial('pages/finance-expenses');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceExpensesNew()
    {
        $page = $this->renderPartial('pages/finance-expenses-new');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceGeneral()
    {
        $page = $this->renderPartial('pages/finance-general');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceGeneralNew()
    {
        $page = $this->renderPartial('pages/finance-general-new');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceAccounts()
    {
        $page = $this->renderPartial('pages/finance-accounts');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionFinanceAccountsNew()
    {
        $page = $this->renderPartial('pages/finance-accounts-new');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionReportsMenu()
    {
        $page = $this->renderPartial('pages/reports-menu');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionReportsBalanceSheet()
    {
        $page = $this->renderPartial('pages/reports-balance-sheet');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionReportsProfitLoss()
    {
        $page = $this->renderPartial('pages/reports-profit-loss');
        return $this->render('page',[
            "page"=>$page
        ]);
    }

    public function actionReportsCashFlow()
    {
        $page = $this->renderPartial('pages/reports-cash-flow');
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
