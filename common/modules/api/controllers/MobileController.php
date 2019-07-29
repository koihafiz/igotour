<?php

namespace common\modules\api\controllers;

use common\models\LoginForm;
use common\models\State;
use frontend\models\SignupForm;
use common\models\Cart;
use common\models\StateService;
use yii\filters\Cors;
use yii\rest\Controller;
use Yii;
use common\models\User;
use yii\web\Request;
use yii\web\Response;
use yii\helpers\Json;

class MobileController extends Controller
{
    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
                ],

            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        // 0 = user not exist, 11 = user exist & logged in, 10 = user exist & cannot logged in

        if(!User::find()->where(['email' => $data['email']])->exists()) {
            return ['status' => 0];
        }else {
            $model = new LoginForm();
            $model->email = $data['email'];
            $model->password = $data['password'];

            if ($model->login()) {
                return ['status' => 11, 'user_id' => Yii::$app->user->identity->id, 'username'=> Yii::$app->user->identity->username,'email'=> Yii::$app->user->identity->email,'phone'=> Yii::$app->user->identity->phone, 'auth_key'=> Yii::$app->user->identity->auth_key, 'cookie'=>Yii::$app->session->id];
                // return ['status' => 11, 'user_id' => Yii::$app->user->identity->id, 'username'=> Yii::$app->user->identity->username, 'auth_key'=> Yii::$app->user->identity->auth_key, 'cookie'=>Yii::$app->session->id];

            }else {
                return ['status' => 10, 'error' => $model->errors];
            }
        }
    }

    public function actionLogoutz($sesId=null)
    {
//        header('Access-Control-Allow-Origin: *');
//        $sessionId = Yii::$app->request->get('sessionId');

        // $sessionId_temp = Yii::$app->request->post();
        // $sessionId = $sessionId_temp['sessionId'];

        if($sesId)
            $deleteSession = Yii::$app->db->createCommand()->delete('session',"id='".$sesId."'")->execute();
        else
            $deleteSession = Yii::$app->user->logout();

        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($deleteSession) {
            return ['status' => '---'];
        }else {
            return ['status' => 'NO, You x login pun cmne nk logout daa'];
        }

    }

    public function actionSignup()
    {
        header('Access-Control-Allow-Origin: *');
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $user_status = $data['user_status'];

        $model = new SignupForm();

        $model->username = $name;
        $model->email = $email;
        $model->phone = $phone;
        $model->password = $password;
        $model->password_repeat = $password;
        $model->user_status = $user_status;
        $model->reference_code = '';

        if($model->signup())
        {
            return ['status' => 'saved'];
        }else {
            return ['status' => $model->errors];
        }
    }

    public function actionFindStates()
    {
        header('Access-Control-Allow-Origin: *');
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();
        $cid = $data['country_id'];

        $model = State::find()->where(['country_id' => $cid])->all();

        return ['countries' => $model];


    }

    public function actionFindServices()
    {
        header('Access-Control-Allow-Origin: *');
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();
        $cid = $data['state_id'];

        $sql = "SELECT a.*,b.title,b.description,b.image_file FROM `state_service` a, `services` b WHERE b.id=a.`service_id` AND a.`state_id` = $cid  GROUP BY a.`service_id`";

        // $model = StateService::findBySql($sql)->all();

        $model = Yii::$app->db->createCommand($sql);
        $find_services = $model->queryAll();

        return ['items' => $find_services];
    }

    public function actionAddToCart()
    {
        $data = Yii::$app->request->post();

        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new Cart();

        $model->user_id = $data['user_id'];
        $model->service_id = $data['service_id'];
        $model->service_title = $data['service_title'];
        $model->country_id = $data['country_id'];
        $model->state_id = $data['state_id'];
        $model->duration = $data['duration'];
        $model->charge = $data['charge'];
        $model->date = $data['date'];
        $model->start_time = $data['start_time'];
        $model->end_time = $data['end_time'];
        $model->status = $data['status'];
        $model->pax = $data['pax'];
        $model->pickup_location = $data['pickup'];

        if($model->save())
            return ['status' => true, 'order_id' => $model->id];
        else
            return ['status' => false];
    }

    public function actionGetCart()
    {
        $data = Yii::$app->request->post();

        Yii::$app->response->format = Response::FORMAT_JSON;

        $user_id = $data['user_id'];

        $sql = "SELECT a.*,b.name as cname,c.name as sname FROM cart a, country b, state c WHERE a.`country_id` = b.`id` AND a.`state_id` = c.`id` AND a.user_id = $user_id AND a.status = 0";

        $model = Yii::$app->db->createCommand($sql);
        $cartData = $model->queryAll();

        return ['cart' => $cartData];


//        $model = Cart::find()->where(['user_id' => $data['user_id'],'status' => 0])->all();

//        if($model !== null)
//            return ['cart' => $model];
    }

    public function actionRemoveSelectedCart($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = Cart::findOne($id);

        if($model->delete())
            return ['status' => true];
        else
            return ['status' => false];
    }

    public function actionGoToBillplz($user_id=null,$price=0,$ref)
    {
        $user = User::findOne($user_id);

        if($user_id != null && $price > 0)
        {
            $mobile = $user->phone ? $user->phone : '0111111111';
            $amount = $price * 100;
            $reference_1_label = 'User_ref';
            $reference_1 = $user_id.'-'.$ref;
            $reference_2_label = 'TRAVELLER EMAIL';
            $reference_2 = $user->email;
            $description = 'PAYMENT FOR IGO TOUR SERVICE';
            $callback_url = 'https://igotour.services/traveller';
            $redirect_url = 'https://igotour.services/traveller';

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
                'name' => $user->username,
                'email' => $user->email,
                'mobile' => $mobile,
                'amount' => $amount,
                'reference_1_label' => $reference_1_label,
                'reference_1' => $reference_1,
//                'reference_2_label' => $reference_2_label,
//                'reference_2' => $reference_2,
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
            exit;
        }
    }

    public function actionTaraa()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        return ['session_id' => 'session_id from api ->'.$data['session_id']];
    }


}