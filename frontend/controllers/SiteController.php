<?php
namespace frontend\controllers;

use common\models\Profile;
use common\models\Services;
use common\models\UserService;
use common\models\State;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout ='main';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index',[
            'uservice' => UserService::findTourGuide(),
        ]);
    }

    public function actionPaymentBillplz($name=null,$email=null,$phone=0111111111,$user_id=null,$price=0,$service)
    {
        if($name != null && $email != null && $user_id != null && $price > 0)
        {
            $mobile = $phone;
            $amount = $price * 100;
            //$amount = 200;
            $reference_1_label = 'Service';
            $reference_1 = $service;
            $reference_2_label = 'EMAIL'; //No KP
            $reference_2 = $email; //No KP
            $description = 'PAYMENT FOR IGO TOUR SERVICE';
            $callback_url = 'https://igotour.services/';
            $redirect_url = 'https://igotour.services/';

            date_default_timezone_set('Asia/Kuala_Lumpur');

            $billplz_gateway_production = 1; //1: Production 0:Sandbox

            if($billplz_gateway_production == 1){
                $billplz_api_key = '579943e0-9306-4783-b7fb-6b7e399974dd';
                $billplz_x_signature = 'S-WSLHRvxU3ql2zkoGShG5jg';
                $link = "https://www.billplz.com/api/v3/bills";
                $link_payment = "https://billplz.com/bills";
                $collection_id = "gh6dtokd";
            } else {
                $billplz_api_key = '75d6a496-728a-453e-970d-7f9af105704f';
                $billplz_x_signature = 'S-F9AbcoXBjOSEEPJQqBS9Fg';
                $link = "https://billplz-staging.herokuapp.com/api/v3/bills";
                $link_payment = "https://billplz-staging.herokuapp.com/bills";
                $collection_id = "jh6xebhy";
            }


            $values = array(
                'collection_id' => $collection_id,
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'amount' => $amount,
                'reference_1_label' => $reference_1_label,
                'reference_1' => $reference_1,
                // 'reference_2_label' => $reference_2_label,
                // 'reference_2' => $reference_2,
                'description' => $description,
                'callback_url' => $callback_url,
                'redirect_url' => $redirect_url
            );

            $params = http_build_query($values);

            //FIRST
            $ch = curl_init();

            curl_setopt($ch,CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3 like Mac OS X) AppleWebKit/603.1.23 (KHTML, like Gecko) Version/10.0 Mobile/14E5239e Safari/602.1');
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_USERPWD, $billplz_api_key . ":" . "");


            $headers = array();
            $headers[] = "Content-Type: application/x-www-form-urlencoded";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);

            $j = json_decode($result, TRUE);

            header('Location: '. $j['url']);
//            exit;
        }
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->redirect(['/profile/edit']);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionCurlecResponse()
    {
        return $this->render('curlecResponse',['data' => Yii::$app->request->get()]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /*public function actionTourGuides()
    {
        return $this->render('tourGuides',[
            'model' => UserService::find()->select('user_id')->distinct()->all(),
        ]);
    }*/

    public function actionTourGuides()
    {
        return $this->render('tourGuides',[
            'model' => UserService::getDetailsProfile(),
        ]);
    }

    public function actionDetailsGuides($id)
    {

        return $this->render('detailsGuides',[
            'guiderProfile' => Profile::find()
                            ->joinWith('userService')
                            ->joinWith('user')
                            ->where(['profile.status' => 10, 'user.status'=> 10, 'profile.id' => $id])
                            ->distinct()->one(),
            'state' => State::find()->all(),
        ]);
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    //return $this->goHome();
                    return $this->redirect(['/profile/edit']);
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRegisterTourBuddy()
    {
        $model = new Profile();
        $services = Services::find()->all();

        if ($model->load(Yii::$app->request->post())) {

            $service = Yii::$app->request->post('services');
            if($service) {
                foreach($service as $servis)
                {
                    $model_serve = new UserService();
                    $model_serve->user_id = Yii::$app->user->identity->id;
                    $model_serve->service_id = $servis;
                    $model_serve->save();
                }

            }
            $model->save();
        }

        return $this->render('registerTourBuddy', [
            'model' => $model, 'services' => $services,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        $msg = '';
        $alert = '';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                $alert = 'success';
                $msg = 'Success! Check your email for further instructions.';

                //return $this->goHome();
            } else {
                $alert = 'warning';
                $msg = 'Error! Sorry, we are unable to reset password for the provided email address.';
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
            'msg'=>$msg,
            'alert'=>$alert 
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        $alert = '';
        $msg = '';

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            /*Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();*/

            $alert = 'success';
            $msg = 'Success! New password saved.';
        }

        return $this->render('resetPassword', [
            'model' => $model,
            'alert' => $alert,
            'msg'   => $msg
        ]);
    }

    public function actionSend() {
        /*$send = Yii::$app->mailer->compose()
        ->setFrom('admin@mybuildingsmart.org.my')
        ->setTo('aishah@paydibs.com')
        ->setSubject('Test Message')
        ->setTextBody('Plain text content. YII2 Application')
        ->setHtmlBody('<b>HTML content <i>Ram Pukar</i></b>')
        ->send();*/
        

        $send = Yii::$app->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => 'Aishah']
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo('aishahhashimbaki@gmail.com')
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();


        if($send){
            echo "Send";
        }
    }
}
