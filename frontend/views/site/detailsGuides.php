<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\User;
use common\models\State;
use common\models\StateService;
use common\models\Profile;

$this->title = 'Details Guides';
$this->params['breadcrumbs'][] = $this->title;
$user_service_id = [];
foreach($guiderProfile->userService as $reqisteredService)
{
    $user_service_id[] = $reqisteredService->service_id;
}

?>
<style>
    .u-header__section {
        background-color: rgba(49, 53, 62, 0.8) !important;
    }
</style>
<br><br><br><br>
<?php echo '<pre>'; //print_r($guiderProfile); die(); ?>

<?php echo '</pre>';?>
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
                <a class="btn btn-block u-btn-outline-primary g-rounded-50 g-py-12 g-mb-10" href="#!">
                    <i class="icon-heart g-pos-rel g-top-1 g-mr-5"></i> Request Buddy
                </a>
                <!-- End User Contact Buttons -->
                <?php }?>
            </div>

            <div class="col-lg-9">
                <!-- User Details -->
                <div class="d-flex align-items-center justify-content-sm-between g-mb-5">
                    <h2 class="g-font-weight-300 g-mr-10"><?=$guiderProfile->user->username?></h2>
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
                <div class="">
                    <div class="shortcode-html">
                        <div class="row">
                            <div class="col-md-3">
                                <?php if(sizeof($user_service_id) > 0):?>
                                <ul class="nav flex-column u-nav-v5-1 u-nav-primary g-height-100x--md g-brd-right--md g-brd-primary" role="tablist" data-target="nav-5-1-primary-ver-border-right" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary">
                                    <?php $i=0;?>
                                    <?php foreach($guiderProfile->userService as $myservice):?>
                                        <?php $i=$i+1;?>
                                        <li class="nav-item">
                                            <a class="nav-link <?=($i == 1)?'active':''?>" data-toggle="tab" href="#koi<?=$myservice->service->id?>_tab" role="tab"><?=$myservice->service->title?></a>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                                <?php endif;?>
                            </div><!-- /col-md-3 -->
                            <!-- List Serrvice -->
                            <div class="col-md-9">
                                <!-- Tab panes -->
                                <div id="nav-5-1-primary-ver-border-right" class="tab-content g-pt-20 g-pt-0--md">
                                    <?php if(sizeof($user_service_id) > 0):?>
                                        <?php $b=0;?>
                                        <?php foreach($guiderProfile->userService as $myservice1):?>
                                            <?php $b=$b+1;?>
                                            <div class="tab-pane fade <?=($b == 1)?'show active':''?>" id="koi<?=$myservice1->service->id?>_tab" role="tabpanel">
                                                <div class="text-center">
                                                    <img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/'.$myservice1->service->image_file?>" class="g-mb-20 " width="60"  height="60" />
                                                    <u class="text-center"><h2><?=$myservice1->service->title?></h2></u><br>
                                                </div>
                                                <h4>Description Service</h4>
                                                <?=$myservice1->description?>
                                                <hr />
                                                <h4>Covered State</h4>
                                                <?php 
                                                    
                                                    $allStates = StateService::find()
                                                                    ->joinWith('state')
                                                                    ->where(['state_service.user_service_id' => $myservice1->id,
                                                                            'state_service.user_id' => $myservice1->user_id, 
                                                                            'state_service.service_id'=>$myservice1->service_id])
                                                                    ->all();
                                                   
                                                     foreach($allStates as $allS):
                                                           echo "<i class='icon-map' > ".$allS->state->name."</i><br />";
                                                        endforeach;
                                                ?>
                                                <hr />

                                                <h4>Image</h4>
                                                <?php 
                                                for ($i=1; $i <= 5; $i++) {
                                                    $img = "img".$i;
                                                    if($myservice1->$img){  ?>
                                                        <img class="img-fluid w-50" src="<?=$myservice1->$img?>" style="margin: 10px">
                                                <?php }} ?>
                                                
                                            </div>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </div><!-- /Tab panes -->
                            </div><!-- /col-md-9 -->
                        </div><!-- /row -->
                    </div><!-- /shortcode-html -->
                </div>
                <!-- End User Skills -->
            </div>
        </div>
    </div>
    </div>
</div>