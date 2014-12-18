<?php
namespace home\controllers;

use Yii;
use common\models\LoginForm;
use home\models\PasswordResetRequestForm;
use home\models\ResetPasswordForm;
use home\models\SignupForm;
use home\models\ContactForm;
use yii\base\InvalidParamException;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\Session;
use yii\web\UnauthorizedHttpException;
use yii\authclient\OAuth2;
use ymobiz\activeforms\ymoLoginForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'login' => [
                'class' => 'ymobiz\actions\LoginAction',
                'options' => [
                    'model' => ymoLoginForm::className(),
                    'request' => 'login',
                    'action' => 'loginAuth',
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        /*echo '<pre>';
        print_r($_COOKIE);
        exit;*/
        return $this->render('index');
    }

    public function actionLoginForm()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new ymoLoginForm();
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /*public function actionLogin()
    {

        $model = new LoginForm();



        if(Yii::$app->request->get('token'))
        {
            //$model->loginApi();
            Yii::$app->user->loginByAccessToken(base64_decode(Yii::$app->request->get('token')));
            Yii::$app->user->login( Yii::$app->user->identity, Yii::$app->request->get('rememberMe') ? 3600 * 24 * 30 : 0);
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionLoginApi()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) /*&& $model->login()*/) {

           /* $oauthClient = new OAuth2;
            $url = $oauthClient->buildAuthUrl(); // Build authorization URL
            Yii::$app->getResponse()->redirect($url); // Redirect to authorization URL.
            // After user returns at our site:
            $code = $_GET['code'];
            $accessToken = $oauthClient->fetchAccessToken($code); // Get access token*/

            $proxy = '127.0.0.1:8118';
            $url = 'http://api.ymobiz.dev/api/web/users/login';
            $fields_string= 'LoginForm[username]=' . $model->username . '&LoginForm[password]=' . $model->password . '&LoginForm[rememberMe]=' . $model->rememberMe;
            $tmp_fname = tempnam("/", "COOKIE");

            //create array of data to be posted
            $post_data['LoginForm[rememberMe]'] = $model->rememberMe;
            $post_data['LoginForm[username]'] = $model->username;
            $post_data['LoginForm[password]'] = $model->password;
            $post_data['_csrf'] = Yii::$app->request->csrfToken;

            //traverse array and prepare data for posting (key1=value1)
            foreach ($post_data as $key => $value) {
                $post_items[] = $key . '=' . $value;
            }

            //create the final string to be posted using implode()
            $post_string = implode('&', $post_items);

            //create cURL connection
            $curl_connection = curl_init($url);

            //set data to be posted
            curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);

            //perform our request
            $result = (string) curl_exec($curl_connection);

            //show information regarding the request

            /*echo curl_errno($curl_connection) . '-' .
                curl_error($curl_connection);*/

           // $access = Json::decode($result);
           // echo  $access;

            //Yii::$app->user->loginByAccessToken(base64_decode($result['accessToken']));
            //Yii::$app->user->login( Yii::$app->user->identity, $result['rememberMe'] ? 3600 * 24 * 30 : 0);

            //close the connection
            curl_close($curl_connection);

            exit;
            //curl_exec($ch);

            //session_start();

            //$string = "login[username]=".urlencode("me@mymagentodomain.co.uk")."&login[password]=".urlencode("password");

            /*$headers[] = 'Accept: *';
            $headers[] = "Connection: Keep-Alive";
            $headers[] = "Access-Control-Allow-Origin: http://ymobiz.dev";
            $headers[] = "Set-Cookie: name=value; httpOnly";
            $headers[] = "Content-type: application/x-www-form-urlencoded;charset=UTF-8";

            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
            curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
            curl_setopt($ch, CURLOPT_HEADER,  0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_COOKIE, $tmp_fname);
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HEADER, true);*/

            /*$output = (string) curl_exec($ch);
            $headers[] = "Connection: Keep-Alive";
            $headers[] = "Content-type: application/x-www-form-urlencoded;charset=UTF-8";

            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
            curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
            curl_setopt($ch, CURLOPT_HEADER,  0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            // Define a URL original (do formulário de login)
            curl_setopt($ch, CURLOPT_URL, $url);

            // Habilita o protocolo POST
            curl_setopt ($ch, CURLOPT_POST, 1);

            // Define os parâmetros que serão enviados (usuário e senha por exemplo)
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $fields_string);

            curl_setopt ($ch, CURLOPT_COOKIEFILE, $tmp_fname);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_COOKIESESSION, true);

            // Define o tipo de transferência (Padrão: 1)
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);*/

            // Executa a requisição
            //$output = curl_exec ($ch);

            // Define uma nova URL para ser chamada (após o login)
            //curl_setopt($ch, CURLOPT_URL, 'http://ymobiz.dev/home/web/site/login');*/

            echo '<pre>';
            print_r(curl_error($ch));
            print_r(curl_getinfo($ch));
            print_r(curl_errno($ch));
            //setcookie("Logged","True",time()+3600,"/",".ymobiz.dev",1);
            print_r($_COOKIE);
            print_r(curl_exec($ch));
            echo '</pre>';

            curl_close($ch);

            // Encerra o cURL
            //curl_close ($ch);

            //open connection
            //$ch = curl_init();

            /*curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($ch, CURLOPT_COOKIE, session_name().'='.session_id());
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HEADER, true);*/

            //$output = (string) curl_exec($ch);
            //curl_close($ch);

           // preg_match('/frontend=(.+); expires=/i', $output, $matches);
            //$temp = $matches[0];
            //$sid = str_replace(array("frontend=","; expires="), "", $temp);


            //set the url, number of POST vars, POST data
            /*curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_COOKIE, session_name().'='.session_id());
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch,CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE );
            //curl_setopt($ch,CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, true);
            //curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);*/
            //execute post

            //$result = curl_exec($ch);

            echo '<pre>';
           // print_r(curl_error($ch));
            //print_r(curl_getinfo($ch));
           // print_r(curl_errno($ch));

            //header("Access-Control-Allow-Origin: http://ymobiz.dev");

            //print_r($result);

            // get cookie
            //preg_match_all('/Set-Cookie:\s*([^;]*)/mi', $result, $m);

            //var_dump($m);
            echo '</pre>';

            //close connection
            //curl_close($ch);
            //return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        /*if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }*/

        if(Yii::$app->request->get('token'))
        {
            //$model->loginApi();
            Yii::$app->user->loginByAccessToken(base64_decode(Yii::$app->request->get('token')));
            Yii::$app->user->login( Yii::$app->user->identity, 0);
            return $this->goBack();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionDev()
    {
        return $this->render("dev");
    }

    public function successCallback($client)
    {
        $attributes = $client->getUserAttributes();
        // user login or signup comes here
    }
}
