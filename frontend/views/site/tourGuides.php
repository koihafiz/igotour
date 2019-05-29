<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\User;
use common\models\State;
use common\models\Profile;
use common\models\Services;

$this->title = 'Tour Guides';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .u-header__section {
        background-color: rgba(49, 53, 62, 0.8) !important;
    }
</style>
<br><br><br><br>
<?php echo '<pre>';?>

<?php echo '</pre>';?>
<!-- perlu check juga status dalam table profile -->
<?php foreach($model as $modal):?>
    <?php $guiderProfile = User::getProfileGuider($modal->user->id); if(!empty($guiderProfile)) {  ?>
    <div class="row justify-content-center">
    <div class="col-10">
        <div class="g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-40">
        <div class="row">
            <div class="col-lg-3 g-mb-40 g-mb-0--lg">
                <!-- User Image -->
                <div class="g-mb-20">
                    <img class="img-fluid w-100" src="<?=($guiderProfile->avatar != NULL) ? $guiderProfile->avatar :'/uploads/avatar/no_image.png'?>" alt="Image Description">
                </div>
                <!-- User Image -->
                <?php if($guiderProfile->status == 10) { ?>
                <!-- User Contact Buttons -->
                <a class="btn btn-block u-btn-outline-darkgray g-rounded-50 g-py-12 g-mb-10" href="<?=Url::to('/site/details-guides?id='.$guiderProfile->id.'')?>">
                    <i class="icon-user-follow g-pos-rel g-top-1 g-mr-5"></i> Details Buddy
                </a>
                <a class="btn btn-block u-btn-outline-primary g-rounded-50 g-py-12 g-mb-10" href="#!">
                    <i class="icon-heart g-pos-rel g-top-1 g-mr-5"></i> Request Buddy
                </a>
                <!-- End User Contact Buttons -->
                <?php }?>
            </div>

            <div class="col-lg-9">
                <!-- User Details -->
                <div class="d-flex align-items-center justify-content-sm-between g-mb-5">
                    <h2 class="g-font-weight-300 g-mr-10"><?=$modal->user->username?></h2>
                </div>
                <p class="lead g-line-height-1_8"><?=$guiderProfile->about_me?></p>
                <!-- End User Details -->

                <hr class="g-brd-gray-light-v4 g-my-20">
                <h4>Details:</h4>
                Location: <?=State::findOne($guiderProfile->state)->name; ?>, <?=$guiderProfile->country?><br />
                Language: <?=$guiderProfile->language; ?><br>
                <!--Age: <?=$guiderProfile->dob?><br>-->
                Gender: <?=$guiderProfile->gender==1 ? 'Male' :'Female';?><br>
                Member Since: <?php 
                    $datetime = $guiderProfile->created_at;
                    $d = date_create_from_format("dmyHis", $datetime);
                    echo date("M")." ". date("Y");
                ?>
                <hr class="g-brd-gray-light-v4 g-my-20">
                <h4>My services:</h4>

                <!-- User Skills -->
                <div class="d-flex flex-wrap text-center d-none">
                    <!-- Counter Pie Chart -->
                    <?php foreach ($guiderProfile->userService as $key => $value) {
                        $Sevices = Services::findOne($value->service_id); 
                     ?>
                        <div class="g-mb-20 g-mb-0--xl col-lg-3">
                            <img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/'.$Sevices->image_file?>" class="g-mb-20" width="100"  height="100" />
                            <h4 class="h6 g-font-weight-300"><?=$Sevices->title?></h4>
                        </div>
                    <?php }?>
                    
                    <!-- End Counter Pie Chart -->
                </div>
                <!-- End User Skills -->
            </div>
        </div>
    </div>
    </div>
</div>
<?php } else{ ?>
<section class="g-pt-90">
        <div class="container">
            <div class="row">
                <!-- Profile Sidebar -->
                <div class="col-lg-3 g-mb-50 g-mb-0--lg">
                    No result found!
                </div>
            </div>
        </div>
</section>

<?php } endforeach;?>