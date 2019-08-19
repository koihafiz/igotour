<?php

namespace frontend\controllers;

use common\models\Buddy;
use common\models\StateService;
use common\models\User;
use common\models\Cart;
use common\models\Payment;
use Yii;
use yii\web\Controller;

class TravellerController extends Controller
{
    public $signing = '';
    public $buddyIDs = [];

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRedirect()
    {
        $r_signing = '';

            $data = [
                'id' =>  $_GET['billplz']['id'],
                'paid_at' => $_GET['billplz']['paid_at'] ,
                'paid' => $_GET['billplz']['paid'],
                'x_signature' => $_GET['billplz']['x_signature']
            ];

            foreach ($data as $key => $value) {
                $r_signing .= 'billplz'.$key . $value;
                if ($key === 'paid') {
                    break;
                } else {
                    $r_signing .= '|';
                }
            }

            $signed= hash_hmac('sha256', $r_signing, Yii::$app->params['x_signature']);
            if ($signed === $data['x_signature']) {
//                echo 'Match!';
                return $this->render('redirect',['data' => $data]);
            } else {
                echo 'Not Match!';
            }

    }
    public function actionCallback()
    {
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
//            $this->actionRequestBuddy($data['id']);

//            $findCartIds = Payment::find()->where(['payment_id' => $data['id']])->one();
//            $user = User::findOne($findCartIds->user_id);
//            $findCartIds->payment_id = 'try to change la';
//            $findCartIds->save();

//            if($findCartIds)
//            {
//                $cartId = explode(",",$findCartIds->cart_id);
//                foreach($cartId as $id)
//                {
//                    $cart = Cart::findOne($id);
//
//                    $buddies = StateService::find()->where(['state_id'=>$cart->state_id,'service_id'=>$cart->service_id])->all();
//                    foreach($buddies as $buddy)
//                    {
//                        $modelBuddy = User::findOne($buddy['user_id']);
//
//                        $this->buddyIDs[] = $modelBuddy->id;
//
//                        Yii::$app->mailer
//                            ->compose(
//                                ['html' => 'inviteBudy-html'],
//                                ['username' => $modelBuddy->username,'cart' => $cart,'user' => $user]
//                            )
//                            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
//                            ->setTo($modelBuddy->email)
//                            ->setSubject('Guide Invitation for Service ' . $cart->service_title)
//                            ->send();
//
//                        $model = new Buddy();
//                        $model->buddy_id = $buddy['user_id'];
//                        $model->cart_id = $id;
//                        $model->status = 0;
//                        $model->save();
//
//                    }
//
//                    $cart->status = 1;
//                    $cart->save();
//                }
//                $findCartIds->status = 1;
//                $findCartIds->save();
//            }



        } else {
            echo 'Not Match!';
        }
    }

    public function actionRequestBuddy($bill_id)
    {
        $findCartIds = Payment::find()->where(['payment_id' => $bill_id])->one();
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

                    $this->buddyIDs[] = $modelBuddy->id;

                    Yii::$app->mailer
                        ->compose(
                            ['html' => 'inviteBudy-html'],
                            ['username' => $modelBuddy->username,'cart' => $cart,'user' => $user]
                        )
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                        ->setTo($modelBuddy->email)
                        ->setSubject('Guide Invitation for Service ' . $cart->service_title)
                        ->send();

                    $model = new Buddy();
                    $model->buddy_id = $buddy['user_id'];
                    $model->cart_id = $id;
                    $model->status = 0;
                    $model->save();

                }

                $cart->status = 1;
                $cart->save();
            }
            $findCartIds->status = 1;
            $findCartIds->save();
        }

    }

}