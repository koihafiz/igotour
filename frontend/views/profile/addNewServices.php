<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;
use marqu3s\summernote\Summernote;
use yii\widgets\ActiveForm;
use common\models\StateService;
use common\models\UserService;
/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Edit Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
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
            <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--2" role="tab">Add New Services</a>
        </li>
    </ul>
    <!-- End Nav tabs -->

    <!-- Tab panes -->
    <div id="nav-1-1-default-hor-left-underline" class="tab-content">
        <!-- Profile Edit -->
        <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--2" role="tabpanel" data-parent="#nav-1-1-default-hor-left-underline">            
            <h2 class="h4 g-font-weight-300">Add New Service</h2>
            <p class="g-mb-25" style="color: red">
                Fill up your service(s) accordingly.<br />
                Your account will ONLY be activated once the service field(s) are completely filled.
            </p>
                <?php $no = 0;?>
                <?php foreach($services as $service):?>
                    <?php if(!in_array($service->id,$user_service_id)):?>
                    <?php $no = $no + 1;?>
<!--                    <form action="">-->
                        <div>
                            <div class="form-group">
                                <label class="d-flex align-items-center justify-content-between">
                                    <span><img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/'.$service->image_file?>" width="50" height="50"> <p style="display: inline; font-weight: bold; margin-left: 10px;"> <?=$service->title?></p></span>
                                    <div class="u-check">
                                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-right-0" name="emailNotification" onchange="openUserServiceForm(this,'<?=$service->id?>')" id="<?=$service->id?>_input" type="checkbox">
                                        <div class="u-check-icon-radio-v7">
                                            <i class="d-inline-block"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div id="<?=$service->id?>_service" class="d-none form-group">
                                <br>
                                <?php echo $this->render('_form_user_service', [
                                    'model' => $model,
                                    'state' => $state,
                                    'service_id' => $service->id,
                                    'service_name' => $service->title,
                                ]) ?> <br>

                            </div>
                        </div>
<!--                    </form>-->
                    <hr class="g-brd-gray-light-v4 g-my-20">
                    <?php endif;?>
                <?php endforeach;?>
                <div class="row">
                    <div class="col-6">
                        <div class="text-sm-left"><a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10 " href="edit"><i class="icon-arrow-left g-pos-rel g-top-1 g-mr-8"></i> My Profile</a></div>
                    </div>
                    <div class="col-6">
                        <div class="text-sm-right"><a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10 " href="registered-services">Registered Services <i class="icon-arrow-right g-pos-rel g-top-1 g-ml-8"> </i></a></div>
                    </div>
                </div>
        </div><!-- /Profile Edit -->
    </div><!-- End Tab panes -->    
</div><!-- /col-lg-9 -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">

    function openUserServiceForm(thhis,service_id)
    {
        if(thhis.checked) {
            $('#'+service_id+'_service').removeClass('d-none');
        }else {
            $('#'+service_id+'_service').addClass('d-none');
        }
    }

</script>
<?php $this->endBlock()?>