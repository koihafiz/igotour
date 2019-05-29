<?php

namespace common\modules\api\controllers;

use common\models\LoginForm;
use common\models\State;
use frontend\models\SignupForm;
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
                return ['status' => 11, 'user_id' => Yii::$app->user->identity->id, 'username'=> Yii::$app->user->identity->username, 'auth_key'=> Yii::$app->user->identity->auth_key, 'cookie'=>Yii::$app->session->id];

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

        $model = new SignupForm();

        $model->username = $name;
        $model->email = $email;
        $model->phone = $phone;
        $model->password = $password;
        $model->password_repeat = $password;
        // $model->reference_code = 'NRC001';

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

        $sql = "SELECT a.*,b.title,b.image_file FROM `state_service` a, `services` b WHERE b.id=a.`service_id` AND a.`state_id` = $cid  GROUP BY a.`service_id`";

        // $model = StateService::findBySql($sql)->all();

        $model = Yii::$app->db->createCommand($sql);
        $find_services = $model->queryAll();

        return ['items' => $find_services];
    }

    public function actionTaraa()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        return ['session_id' => 'session_id from api ->'.$data['session_id']];
    }


}
