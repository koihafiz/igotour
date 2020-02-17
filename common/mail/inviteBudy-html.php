<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>

<div class="">
    <p>Dear <?= Html::encode($username) ?>,</p>

    <p>There's request from traveller to use your travel service. The details are as follows:</p>
    <ul>
        <li>Traveller's Name : <b><?=$user->username?></b></li>
        <li>Traveller's Email : <b><?=$user->email?></b></li>
        <li>Traveller's Phone : <b><?=$user->phone?></b></li>
        <li>Service : <b><?=$cart->service_title?></b></li>
        <li>State/Country of Service : <b><?=$cart->state->name?> <?=$cart->country->name?></b></li>
        <li>Total Pax : <b><?=$cart->pax?> ( <?=$cart->male?>:Male,  <?=$cart->female?>:Female, <?=$cart->infant?>:Infant )</b></li>
        <li>Date : <b><?=Yii::$app->formatter->asDate($cart->date,'long')?></b></li>
        <li>Time : <b><?=Yii::$app->formatter->asTime($cart->start_time)?> - <?=Yii::$app->formatter->asTime($cart->end_time)?></b></li>
        <li>Duration : <b><?=$cart->duration?> Hours</b></li>
        <li>Pickup Location : <b><?=$cart->pickup_location?></b></li>
        <li>Specific Place (if any) : <b><?=$cart->specific_place?></b></li>

    </ul>
    <p>Kindly do confirm this invitation on Tour Buddy mobile app.</p>

	<p>Thank you<br/>
	IGO Services Team</p>

    <p></p>
</div>
