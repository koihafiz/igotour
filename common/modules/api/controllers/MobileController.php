<?php

namespace common\modules\api\controllers;

use common\models\Buddy;
use common\models\Country;
use common\models\LoginForm;
use common\models\LoginFormBuddy;
use common\models\Profile;
use common\models\State;
use frontend\models\PasswordResetRequestForm;
use frontend\models\SignupForm;
use common\models\Cart;
use common\models\Payment;
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
    public $buddyIDs = [];

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

    public function actionLoginBuddy()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        // 0 = user not exist, 11 = user exist & has logged in, 10 = user exist & cannot logged in

        if(!User::find()->where(['email' => $data['email']])->exists()) {
            return ['status' => 0];
        }else {
            $model = new LoginFormBuddy();
            $model->email = $data['email'];
            $model->password = $data['password'];

            if ($model->login()) {
                return ['status' => 11, 'user_id' => Yii::$app->user->identity->id, 'username'=> Yii::$app->user->identity->username,'email'=> Yii::$app->user->identity->email,'phone'=> Yii::$app->user->identity->phone, 'auth_key'=> Yii::$app->user->identity->auth_key, 'cookie'=>Yii::$app->session->id];
            }else {
                return ['status' => 10, 'error' => $model->errors];
            }
        }
    }

    public function actionSignout($sessionId=null)
    {
        header('Access-Control-Allow-Origin: *');
//        $sessionId = Yii::$app->request->get('sessionId');
        if($sessionId != null)
            $deleteSession = Yii::$app->db->createCommand()->delete('session',"id='".$sessionId."'")->execute();
        else
            $deleteSession = Yii::$app->user->logout();

        Yii::$app->response->format = Response::FORMAT_JSON;

        if ($deleteSession) {
            return ['logout' => 'OK'];
        }else {
            return ['logout' => 'NO, You x login pun cmne nk logout daa'];
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
        $ic = $data['ic'];

        $model = new SignupForm();

        $model->username = $name;
        $model->email = $email;
        $model->phone = $phone;
        $model->password = $password;
        $model->password_repeat = $password;
        $model->user_status = $user_status;
        $model->reference_code = '';
        $model->ic_passport = $ic;
        $model->role = 'tr';

        if($model->signup())
        {
            return ['status' => 'saved'];
        }else {
            return ['status' => $model->errors];
        }
    }

    public function actionSignupBuddy()
    {
        header('Access-Control-Allow-Origin: *');
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];

//        $address = $data['address'];
//        $postcode = $data['postcode'];
//        $city = $data['city'];
//        $state = $data['state'];
//        $country = $data['country'];

        $password = $data['password'];
        $user_status = $data['user_status'];
        $ic = $data['ic'];

        $model = new SignupForm();

        $model->username = $name;
        $model->email = $email;
        $model->phone = $phone;


        $model->password = $password;
        $model->password_repeat = $password;
        $model->user_status = $user_status;
        $model->reference_code = '';
        $model->ic_passport = $ic;
        $model->role = 'bd';

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
        $model->male = $data['male'];
        $model->female = $data['female'];
        $model->infant = $data['infant'];
        $model->pickup_location = $data['pickup'];
        $model->specific_place = $data['specificplace'];

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

    public function actionGoToBillplz($user_id=null,$price=0,$cartId)
    {
        $user = User::findOne($user_id);

        if($user_id != null && $price > 0)
        {
            $payment_id = $user_id.'-'.time();

            $mobile = $user->phone ? $user->phone : '0111111111';
            $amount = $price * 100;
            $reference_1_label = 'Payment ID';
            $reference_1 = $payment_id;
            $reference_2_label = 'TRAVELLER EMAIL';
            $reference_2 = $user->email;
            $description = 'PAYMENT FOR IGO TOUR SERVICE';
//            $callback_url = 'https://igotour.services/traveller/callback';
            $callback_url = 'https://igotour.services/api/mobile/callback';
            $redirect_url = 'https://igotour.services/traveller/redirect';

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
//                'reference_1_label' => $reference_1_label,
//                'reference_1' => $reference_1,
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

            $checkPayment = Payment::find()
                ->where( [ 'user_id' => $user_id, 'cart_id'  => $cartId, 'status' => 0] )
                ->one();

            if(!$checkPayment)
            {
                $payment = new Payment();
                $payment->payment_id = $j['id'];
                $payment->user_id = $user_id;
                $payment->cart_id = $cartId;
                $payment->status = 0;
                $payment->save();
            }else {
                $checkPayment->payment_id = $j['id'];
                $checkPayment->save();
            }


//    //    This action should run on success payment - with auto-run
//            $this->actionRequestBuddy($cartId,$user);

            exit;
        }
    }

    public function actionCallback()
    {
        $buddyIDs = [];

        $data = array(
            'amount' => $_POST['amount'],
            'collection_id' =>  $_POST['collection_id'],
            'due_at' => $_POST['due_at'],
            'email' =>  $_POST['email'],
            'id' =>  $_POST['id'],
            'mobile' =>  $_POST['mobile'],
            'name' => $_POST['name'],
            'paid_amount' => $_POST['paid_amount'],
            'paid_at' =>  $_POST['paid_at'],
            'paid' => $_POST['paid'],
            'state' =>  $_POST['state'],
            'url' => $_POST['url'],
            'x_signature' => $_POST['x_signature']
        );

        $c_signing = '';

        foreach ($data as $key => $value) {
            $c_signing .= $key . $value;
            if ($key === 'url') {
                break;
            } else {
                $c_signing .= '|';
            }
        }

        $signed= hash_hmac('sha256', $c_signing, Yii::$app->params['x_signature']);
        if ($signed === $data['x_signature']) {
//            echo 'Match!';

            $findCartIds = Payment::find()->where(['payment_id' => $data['id']])->one();
            $user = User::findOne($findCartIds->user_id);

            if($findCartIds)
            {
                $cartId = explode(",",$findCartIds->cart_id);
                foreach($cartId as $id)
                {
                    $cart = Cart::findOne($id);

                    $buddies = StateService::find()->where(['state_id'=>$cart->state_id,'service_id'=>$cart->service_id])->all();
                    foreach($buddies as $buddy)
                    {
                        $modelBuddy = User::findOne($buddy['user_id']);

                        $buddyIDs[] = $modelBuddy->id;

                        Yii::$app->mailer
                            ->compose(
                                ['html' => 'inviteBudy-html'],
                                ['username' => $modelBuddy->username,'cart' => $cart,'user' => $user]
                            )
                            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                            ->setTo($modelBuddy->email)
                            ->setSubject('Guide Invitation for Service ' . $cart->service_title)
                            ->send();

//                        $model = new Buddy();
//                        $model->buddy_id = $buddy['user_id'];
//                        $model->traveller_id = $findCartIds->user_id;
//                        $model->cart_id = $id;
//                        $model->status = 0;
//                        $model->save();

                    }

                    $cart->payment_id = $data['id'];
                    $cart->status = 1;
                    $cart->save();
                }
                $findCartIds->status = 1;
                $findCartIds->amount = ((int)$data['amount'])/100;
                $findCartIds->save();
            }



        } else {
            echo 'Not Match!';
        }
    }

    public function actionBuddyRequestList()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $buddyID = $data['buddyID'];

//        $sql = 'SELECT a.*,b.service_title,b.pax,b.duration,DATE_FORMAT(FROM_UNIXTIME(b.date),"%e %b %Y") as datez,DATE_FORMAT(FROM_UNIXTIME(b.start_time),"%H:%i") as timefrom,DATE_FORMAT(FROM_UNIXTIME(b.end_time),"%H:%i") as timeto,DATE_FORMAT(FROM_UNIXTIME(b.created_at),"%e %b %Y %H:%i") as createdOn,now() as noww,c.name as country,d.name as state FROM buddy a, cart b, country c, state d WHERE a.buddy_id = '.$buddyID.' AND a.status = 0 AND a.cart_id = b.id AND b.country_id = c.id AND b.state_id = d.id';
        $sql = 'SELECT a.*,b.service_title,b.pax,b.duration,DATE_FORMAT(FROM_UNIXTIME(b.date),"%e %b %Y") as datez,DATE_FORMAT(FROM_UNIXTIME(b.start_time),"%H:%i") as timefrom,DATE_FORMAT(FROM_UNIXTIME(b.end_time),"%H:%i") as timeto,b.created_at as created_on,b.pickup_location,c.name as country,d.name as state FROM buddy a, cart b, country c, state d WHERE a.buddy_id = '.$buddyID.' AND a.status = 0 AND a.cart_id = b.id AND b.country_id = c.id AND b.state_id = d.id';

        $model = Yii::$app->db->createCommand($sql);
        $data = $model->queryAll();

        if($data)
            return ['status' => true, 'list' => $data,'nowTimestamp' => time()];
        else
            return ['status' => false];
    }

    public function actionUpdateStatusBuddy()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $id = $data['id'];
        $status = $data['status'];

        $model = Buddy::findOne($id);
        $model->status = $status;
        if($model->save())
            return ['status' => true];
        else
            return ['status' => false,'error' => $model->errors];
    }

    public function actionMyTours()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        $traveller_id = $data['user_id'];

        $model = Payment::find()->where(['user_id' => $traveller_id, 'status' => 1])->all();

        if($model)
            return ['status' => true, 'data' => $model,'nowTimestamp' => time()];
        else
            return ['status' => false , 'err' => $model->errors];
    }

    public function actionGetMyCarts()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        $cart_ids = $data['cart_id'];

        $cart_ids_string = array_map('intval', explode(',', $cart_ids));
        $cart_ids_int = trim(implode(',', $cart_ids_string),'"');

        $sql = 'SELECT a.*,DATE_FORMAT(FROM_UNIXTIME(a.date),"%e %b %Y") as datez,DATE_FORMAT(FROM_UNIXTIME(a.start_time),"%H:%i") as timefrom,DATE_FORMAT(FROM_UNIXTIME(a.end_time),"%H:%i") as timeto FROM cart a WHERE a.id IN ('.$cart_ids_int.') AND a.status = 1';

        $model = Yii::$app->db->createCommand($sql);
        $data = $model->queryAll();
        //$sql = 'SELECT a.*,b.service_title,b.pax,b.duration,DATE_FORMAT(FROM_UNIXTIME(b.date),"%e %b %Y") as datez,DATE_FORMAT(FROM_UNIXTIME(b.start_time),"%H:%i") as timefrom,DATE_FORMAT(FROM_UNIXTIME(b.end_time),"%H:%i") as timeto,b.created_at as created_on,b.pickup_location,c.name as country,d.name as state FROM buddy a, cart b, country c, state d WHERE a.buddy_id = '.$buddyID.' AND a.status = 0 AND a.cart_id = b.id AND b.country_id = c.id AND b.state_id = d.id';

        if($data)
            return ['status' => true, 'data' => $data,'nowTimestamp' => time()];
        else
            return ['status' => false];
    }

    public function actionChooseBuddy()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        $cart_id = $data['cart_id'];
        $traveller_id = $data['myid'];

//        $model = Buddy::find()->where(['traveller_id' => $traveller_id,'cart_id' => $cart_id, 'status' => 2])->all();

        $sql = 'SELECT a.buddy_id,a.traveller_id,a.cart_id,a.status AS buddy_tbl_status,aa.buddy_id as status_buddy,b.username,b.email,b.phone,DATE_FORMAT(FROM_UNIXTIME(b.created_at),"%e %b %Y") as joinedon,c.* FROM buddy a, cart aa, user b, profile c WHERE a.traveller_id = '.$traveller_id.' AND a.cart_id = '.$cart_id.' AND a.status = 2 AND a.buddy_id = b.id  AND a.cart_id = aa.id AND a.buddy_id = c.user_id';

        $mode = Yii::$app->db->createCommand($sql);
        $model = $mode->queryAll();

        if($model)
            return ['status' => true, 'data' => $model];
        else
            return ['status' => false];


    }

    public function actionSetBuddy()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        $cart_id = $data['cart_id'];
        $buddy_id = $data['buddy_id'];

        $model = Cart::findOne($cart_id);
        $model->buddy_id = $buddy_id;


        if($model->save()){

            $buddy = User::findOne($buddy_id);
            $buddyDetails = $buddy->myProfile;

            return ['status' => true, 'buddy' => $buddy,'buddyDetails' => $buddyDetails];
        }
        else
            return ['status' => false];


    }

    public function actionCreateBuddy()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        $model = new Buddy();
        $model->buddy_id = $data['buddy_id'];
        $model->traveller_id = $data['traveller_id'];
        $model->cart_id = $data['cart_id'];
        $model->status = 2;

        if($model->save())
            return ['status' => true];
        else
            return ['status' => false,'error' => $model->errors];
    }

    public function actionGetBuddyProfile()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->post();

        $user_id = $data['user_id'];

        $model = User::findOne($user_id);

        if($model){
            return ['status' => true, 'user' => $model,'profile' => $model->profile,'state_list' => State::find()->where(['country_id' => $model->myProfile->country])->all(),'country_list' => Country::find()->all()];
        }
        else
            return ['status' => false];


    }

    public function actionUpdateBuddyProfile()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $user_id = $data['user_id'];
        $profile_id = $data['profile_id'];
        $aboutme = $data['aboutme'];
        $username = $data['username'];
        $phone = $data['phone'];
        $website = $data['website'];
        $address = $data['address'];
        $postcode = $data['postcode'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];

        $model = User::findOne($user_id);
        $profile = Profile::findOne($profile_id);
        $model->username = $username;
        $model->phone = $phone;

        $profile->website = $website;
        $profile->address = $address;
        $profile->postcode = $postcode;
        $profile->city = $city;
        $profile->state = $state;
        $profile->country = $country;
        $profile->about_me = $aboutme;

        if($model->save() && $profile->save())
            return ['status' => true];
        else
            return ['status' => false,'error' => $model->errors];
    }

    public function actionBuddySelectedList()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $buddyID = $data['buddyID'];

//        $sql = 'SELECT b.service_title,b.pax,b.duration,b.date,DATE_FORMAT(FROM_UNIXTIME(b.date),"%e %b %Y") as datez,DATE_FORMAT(FROM_UNIXTIME(b.start_time),"%H:%i") as timefrom,DATE_FORMAT(FROM_UNIXTIME(b.end_time),"%H:%i") as timeto,b.created_at as created_on,b.pickup_location,c.name as country,d.name as state,a.username,a.phone,a.email FROM cart b, country c, state d, user a WHERE b.buddy_id = '.$buddyID.' AND b.status = 1 AND b.country_id = c.id AND b.state_id = d.id AND b.user_id = a.id';
//        $model1 = Yii::$app->db->createCommand($sql);
//        $model = $model1->queryAll();

        $today = strtotime(date('Y-m-d'));

        $model = Cart::find()
            ->select(['services.id AS serviceId',
                'services.title AS serviceTitle',
                'services.price AS servicePrice',
                'services.description AS serviceDescription',
                'services.image_file',
                'user.username',
                'user.phone',
                'cart.*',
                'DATE_FORMAT(FROM_UNIXTIME(cart.date),"%e %b %Y") as datez',
                'DATE_FORMAT(FROM_UNIXTIME(cart.start_time),"%H:%i") as timefrom',
                'DATE_FORMAT(FROM_UNIXTIME(cart.end_time),"%H:%i") as timeto',
                'country.name AS countryName',
                'state.name AS stateName' ])
            ->leftJoin('buddy','buddy.cart_id = cart.id')
            ->leftJoin('state_service','state_service.service_id = cart.service_id AND state_service.country_id = cart.country_id AND state_service.state_id = cart.state_id')
            ->leftJoin('services','services.id = cart.service_id')
            ->leftJoin('country','country.id = cart.country_id')
            ->leftJoin('state','state.id = cart.state_id')
            ->leftJoin('user','user.id = cart.user_id')
            ->where(['state_service.user_id'=> (int)$buddyID,
                'cart.status' => 1,
                'cart.buddy_id'=> $buddyID,
            ])
            //->andWhere(['=', 'buddy.buddy_id', Yii::$app->user->identity->id])
//            ->andWhere(['IS', 'cart.buddy_id', NULL])
            ->andWhere(['>=', 'cart.date', $today])
            ->groupBy('cart.id')
            ->asArray()->all();

        if($model)
            return ['status' => true, 'list' => $model,'nowTimestamp' => time()];
        else
            return ['status' => false];
    }

    public function actionRequestPasswordReset()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $email = $data['email'];

        $model = new PasswordResetRequestForm();
        $model->email = $email;

        if ($model->validate()) {
            if ($model->sendEmail()) {
                return ['status' => true, 'msg' => 'Success! Check your email for further instructions.'];
            } else {
                return ['status' => false, 'msg' => 'We are Sorry, unable to send reset password link to the provided email address.'];
            }
        }else {
            return ['status' => false, 'msg' => 'Error!, We are unable to reset password for the provided email address.'];
        }
    }

    public function actionFindMyTotalTravellerRequest()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $buddyID = $data['buddyID'];

        $today = strtotime(date('Y-m-d'));
        $plan = Cart::find()
            ->select(['services.id AS serviceId',
                'services.title AS serviceTitle',
                'services.price AS servicePrice',
                'services.description AS serviceDescription',
                'services.image_file',
                'cart.*',
                'country.name AS countryName',
                'state.name AS stateName' ])
            ->leftJoin('buddy','buddy.cart_id = cart.id')
            ->leftJoin('state_service','state_service.service_id = cart.service_id AND state_service.country_id = cart.country_id AND state_service.state_id = cart.state_id')
            ->leftJoin('services','services.id = cart.service_id')
            ->leftJoin('country','country.id = cart.country_id')
            ->leftJoin('state','state.id = cart.state_id')
            ->where(['state_service.user_id'=> (int)$buddyID,
                'cart.status' => 1,
                //'buddy.status'=> 0,
            ])
            ->andWhere(['IS', 'cart.buddy_id', NULL])
            ->andWhere(['>=', 'cart.date', $today])
            ->groupBy('cart.id')
            //->andWhere(['!=', 'cart.buddy_id', Yii::$app->user->identity->id])
            ->count();

        if($plan)
            return ['status' => true, 'total' => $plan,'nowTimestamp' => time()];
        else
            return ['status' => false];
    }

    public function actionFindMyListTravellerRequest()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $buddyID = $data['buddyID'];

        $today = strtotime(date('Y-m-d'));

        $model = Cart::find()
            ->select(['services.id AS serviceId',
                'services.title AS serviceTitle',
                'services.price AS servicePrice',
                'services.description AS serviceDescription',
                'services.image_file',
                'cart.*',
                'DATE_FORMAT(FROM_UNIXTIME(cart.date),"%e %b %Y") as datez',
                'DATE_FORMAT(FROM_UNIXTIME(cart.start_time),"%H:%i") as timefrom',
                'DATE_FORMAT(FROM_UNIXTIME(cart.end_time),"%H:%i") as timeto',
                'country.name AS countryName',
                'state.name AS stateName' ])
            ->leftJoin('buddy','buddy.cart_id = cart.id')
            ->leftJoin('state_service','state_service.service_id = cart.service_id AND state_service.country_id = cart.country_id AND state_service.state_id = cart.state_id')
            ->leftJoin('services','services.id = cart.service_id')
            ->leftJoin('country','country.id = cart.country_id')
            ->leftJoin('state','state.id = cart.state_id')
            ->where(['state_service.user_id'=> (int)$buddyID,
                'cart.status' => 1,
                //'buddy.status'=> 0,
            ])
            //->andWhere(['=', 'buddy.buddy_id', Yii::$app->user->identity->id])
            ->andWhere(['IS', 'cart.buddy_id', NULL])
            ->andWhere(['>=', 'cart.date', $today])
            ->groupBy('cart.id')
            ->asArray()->all();

        if($model)
            return ['status' => true, 'list' => $model,'nowTimestamp' => time()];
        else
            return ['status' => false];
    }

    public function actionIsOffered()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $buddyID = $data['buddyID'];
        $travellerID = $data['travellerID'];
        $cartID = $data['cartID'];

        $model = Buddy::find()
            ->where([ 'buddy_id' => $buddyID, 'traveller_id' => $travellerID, 'cart_id' => $cartID, 'status' => 2 ])
            ->one();

        if($model)
            return ['status' => true];
        else
            return ['status' => false];

    }

}