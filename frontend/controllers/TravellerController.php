<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class TravellerController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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

//            date_default_timezone_set('Asia/Kuala_Lumpur');

            $billplz_gateway_production = 1; //1: Production 0:Sandbox

            if($billplz_gateway_production == 1){
                $billplz_api_key = Yii::$app->params['api_secret_key'];
                $billplz_x_signature = Yii::$app->params['x_signature'];
                $link = Yii::$app->params['billplz_api_link'];
                $link_payment = Yii::$app->params['billplz_payment_link'];
                $collection_id = Yii::$app->params['collection_id'];
            } else {
                $billplz_api_key = Yii::$app->params['sapi_secret_key'];
                $billplz_x_signature = Yii::$app->params['sx_signature'];
                $link = Yii::$app->params['sbillplz_api_link'];
                $link_payment = Yii::$app->params['sbillplz_payment_link'];
                $collection_id = Yii::$app->params['scollection_id'];
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

}
