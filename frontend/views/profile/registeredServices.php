<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;
use marqu3s\summernote\Summernote;
use yii\widgets\ActiveForm;
use common\models\StateService;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Registered Services');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['setting']];
$this->params['breadcrumbs'][] = $this->title;

$myProfile = Yii::$app->user->identity->profile;
$user_service_id = [];
foreach($user_service as $reqisteredService)
{
    $user_service_id[] = $reqisteredService->service_id;
}
?>
<style>
    .form-control:disabled, .form-control[readonly] {
        background-color : #f9fcff;
    }
    .chosen-single span {
        color: #555;
    }
</style>

<div class="col-lg-9">
    <!-- Nav tabs -->
    <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
        <li class="nav-item">
            <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3" role="tab">Registered Services</a>
        </li>
    </ul>
    <!-- End Nav tabs -->

    <!-- Tab panes -->
    <div id="nav-1-1-default-hor-left-underline" class="tab-content">
        <!-- Service Options -->
        <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--3" role="tabpanel" data-parent="#nav-1-1-default-hor-left-underline">
            <h2 class="h4 g-font-weight-300">Registered Service(s)</h2>
            <p class="g-mb-25">Below are the registered services of yours.</p>
            <?=$alert_msg != null ? "
            <div class='alert alert-success'>
              ".$alert_msg."
            </div>" : '';?>
            <div class="shortcode-html">
                <div class="row">
                    <div class="col-md-3">
                        <?php if(sizeof($user_service_id) > 0):?>
                        <ul class="nav flex-column u-nav-v5-1 u-nav-primary g-height-100x--md g-brd-right--md g-brd-primary" role="tablist" data-target="nav-5-1-primary-ver-border-right" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary">
                            <?php $i=0;?>
                            <?php foreach($user_service as $myservice):?>
                                <?php $i=$i+1;?>
                            <li class="nav-item">
                                <a class="nav-link <?=($i == 1)?'active':''?>" data-toggle="tab" href="#koi<?=$myservice->service->id?>_tab" role="tab"><?=$myservice->service->title?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                    </div>

                    <div class="col-md-9">
                        <!-- Tab panes -->
                        <div id="nav-5-1-primary-ver-border-right" class="tab-content g-pt-20 g-pt-0--md">
                            <?php if(sizeof($user_service_id) > 0):?>
                                <?php $b=0;?>
                                <?php foreach($user_service as $myservice1):?>
                                    <?php $b=$b+1;?>
                                    <div class="tab-pane fade <?=($b == 1)?'show active':''?>" id="koi<?=$myservice1->service->id?>_tab" role="tabpanel">
                                        <div class="text-center">
                                            <img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/'.$myservice1->service->image_file?>" class="g-mb-20 " width="60"  height="60" />
                                            <u class="text-center"><h2><?=$myservice1->service->title?></h2></u><br>
                                        </div>
                                        <form action="<?=Url::toRoute('profile/registered-services')?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                            <div class="form-group field-userservice-description has-success">
                                                <label class="control-label" for="userservice-description">Your Description about this Service</label>
                                                <textarea id="userservice-description" class="form-control" name="myservice_description" rows="2" aria-invalid="false"><?=$myservice1->description?></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                            <?php $allStates = StateService::find()->where(['user_service_id' => $myservice1->id,'user_id' => Yii::$app->user->identity->id])->all();?>
                                            <?php
                                                $myState = [];
                                                foreach($allStates as $allS):
                                                    $myState[$allS->state_id] = $allS->state_id;
                                                endforeach;
                                            ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="control-label" style="display: block;margin-bottom: 1.5rem" for="userservice"><br>Please select all states that you going to serve for this service.</label>
                                                    <?php foreach($state as $stat):?>
                                                        <div class="form-check-inline" style="margin-right: 2.75rem;margin-bottom: 1rem">
                                                            <label class="form-check-label" for="my-<?=$myservice1->id.$stat->id?>">
                                                                <input type="checkbox" class="form-check-input" id="my-<?=$myservice1->id.$stat->id?>" name="mystate[]" value="<?=$stat->id?>" <?=(array_key_exists($stat->id,$myState))?'checked':''?>><?=$stat->name?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach;?>
                                                </div>
                                            </div>

                                            <div class="row" style="margin-bottom: 21px">
                                                <div class="col-md-12">
                                                    <label class="control-label" for="userservice-img1"><br>Attach image for this service if any.</label>
                                                    <input type="hidden" name="tab" value="myservices">
                                                    <input type="hidden" name="myservice_id" value="<?=$myservice1->id?>">
                                                    <input type="hidden" name="myservice_name" value="<?=$myservice1->service->title?>">
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4 form-group field-userservice-img1">
                                                    <label class="control-label" for="userservice-img1">Image 1</label><br>
                                                    <?php if($myservice1->img1):?>
                                                        <img src="<?=$myservice1->img1.'?='.Date('U')?>" width="71px" alt=""><br>
                                                    <?php endif;?>
                                                    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                                                        <input id="userservice-img1" name="myservice_img1" type="file">
                                                        <input name="myservice_img1_x" value="<?=$myservice1->img1?>" type="hidden">
                                                        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                                                        <span class="js-value"><?=($myservice1->img1)?'Update this image':'Attach Image 1'?></span>
                                                    </label>
                                                    <div class="help-block"></div>
                                                </div>
                                                <div class="col-md-4 form-group field-userservice-img2">
                                                    <label class="control-label" for="userservice-img2">Image 2</label><br>
                                                    <?php if($myservice1->img2):?>
                                                        <img src="<?=$myservice1->img2.'?='.Date('U')?>" width="71px" alt=""><br>
                                                    <?php endif;?>
                                                    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                                                        <input id="userservice-img2" name="myservice_img2" type="file">
                                                        <input name="myservice_img2_x" value="<?=$myservice1->img2?>" type="hidden">
                                                        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                                                        <span class="js-value"><?=($myservice1->img2)?'Update this image':'Attach Image 2'?></span>
                                                    </label>
                                                    <div class="help-block"></div>
                                                </div>
                                                <div class="col-md-4 form-group field-userservice-img3">
                                                    <label class="control-label" for="userservice-img3">Image 3</label><br>
                                                    <?php if($myservice1->img3):?>
                                                        <img src="<?=$myservice1->img3.'?='.Date('U')?>" width="71px" alt=""><br>
                                                    <?php endif;?>
                                                    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                                                        <input id="userservice-img3" name="myservice_img3" type="file">
                                                        <input name="myservice_img13_x" value="<?=$myservice1->img3?>" type="hidden">
                                                        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                                                        <span class="js-value"><?=($myservice1->img3)?'Update this image':'Attach Image 3'?></span>
                                                    </label>
                                                    <div class="help-block"></div>
                                                </div>
                                                <div class="col-md-4 form-group field-userservice-img4">
                                                    <label class="control-label" for="userservice-img4">Image 4</label><br>
                                                    <?php if($myservice1->img4):?>
                                                        <img src="<?=$myservice1->img4.'?='.Date('U')?>" width="71px" alt=""><br>
                                                    <?php endif;?>
                                                    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                                                        <input id="userservice-img4" name="myservice_img4" type="file">
                                                        <input name="myservice_img4_x" value="<?=$myservice1->img4?>" type="hidden">
                                                        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                                                        <span class="js-value"><?=($myservice1->img4)?'Update this image':'Attach Image 4'?></span>
                                                    </label>
                                                    <div class="help-block"></div>
                                                </div>
                                                <div class="col-md-4 form-group field-userservice-img5">
                                                    <label class="control-label" for="userservice-img5">Image 5</label><br>
                                                    <?php if($myservice1->img5):?>
                                                        <img src="<?=$myservice1->img5.'?='.Date('U')?>" width="71px" alt=""><br>
                                                    <?php endif;?>
                                                    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                                                        <input id="userservice-img5" name="myservice_img5" type="file">
                                                        <input name="myservice_img5_x" value="<?=$myservice1->img5?>" type="hidden">
                                                        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                                                        <span class="js-value"><?=($myservice1->img5)?'Update this image':'Attach Image 5'?></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-4 form-group field-userservice-img6">
                                                    <label class="control-label" for="userservice-img6">Image 6</label><br>
                                                    <?php if($myservice1->img6):?>
                                                        <img src="<?=$myservice1->img6.'?='.Date('U')?>" width="71px" alt=""><br>
                                                    <?php endif;?>
                                                    <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                                                        <input id="userservice-img6" name="myservice_img6" type="file">
                                                        <input name="myservice_img6_x" value="<?=$myservice1->img6?>" type="hidden">
                                                        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                                                        <span class="js-value"><?=($myservice1->img6)?'Update this image':'Attach Image 6'?></span>
                                                    </label>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>

                                            <div class="form-group" style="text-align: center;">
                                                <button type="submit" class="btn btn-md u-btn-primary g-mr-10 g-mb-15">Update</button>
                                                <a href="#!" onclick="confirmRemove('<?=$myservice1->id?>')" class="btn btn-md u-btn-lightred g-mr-10 g-mb-15">Remove</a>
                                            </div>

                                        </form>
                                    </div>
                                <?php endforeach;?>
                            <?php endif;?>
                        </div>
                        <!-- End Tab panes -->
                    </div>
                </div>
            </div><!--- /shortcode-html -->

            <div class="shortcode-scripts">
                <?php $this->beginBlock('JsBlock') ?>
                    <script type="text/javascript">
                        $(document).on('ready', function () {
                            // initialization of tabs
                            $.HSCore.components.HSTabs.init('[role="tablist"]');
                        });

                        $(window).on('resize', function () {
                            setTimeout(function () {
                                $.HSCore.components.HSTabs.init('[role="tablist"]');
                            }, 200);
                        });
                    </script>
                <?php $this->endBlock()?>
            </div>

        </div>
        <!-- End Reg Service Options -->
    </div>
    <!-- End Tab panes -->
</div>

<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">
    $(document).ready(function(){
    //remove alert
        setTimeout(function(){
            $('.alert').fadeOut(1000);
            // $('.feedback').hide(1000); // you can also try this
        }, 2000);
    });

    function confirmRemove(user_service_id)
        {
            let yes = confirm("Remove this service from your list?");
            if(yes) {
                $.ajax({
                    url: '<?=Yii::$app->urlManager->createUrl('/profile/remove-my-service') ?>',
                    type: 'post',
                    data: {user_service_id: user_service_id},
                    success: function (data) {
                        if(data.status)
                            location.reload(true);
                    }
                });
            }
        }
</script>
<?php $this->endBlock()?>