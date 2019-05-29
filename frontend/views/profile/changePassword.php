<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;
use marqu3s\summernote\Summernote;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Change Password');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['change-password']];
$this->params['breadcrumbs'][] = $this->title;

$myProfile = Yii::$app->user->identity;

$baseUrl = Yii::$app->request->BaseUrl;
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
            <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3" role="tab">Change Password</a>
        </li>
    </ul>
    <!-- End Nav tabs -->

    <!-- Tab panes -->
    <div id="nav-1-1-default-hor-left-underline" class="tab-content">
        <!-- Others Settings -->
        <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--3" role="tabpanel" data-parent="#nav-1-1-default-hor-left-underline">
            <?=$data_message != null ? "
            <div class='alert alert-success'>
              ".$data_message."
            </div>" : '';?>
            <form method="post" action="<?=Url::toRoute('profile/change-password')?>">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                <?php if($myProfile):?>
                    <input type="hidden" name="profile_id" id="profile_id" value="<?=$myProfile->id?>">
                <?php endif;?>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Current Password</label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input class="form-control form-control-md rounded-0 g-py-13 pr-0" type="password" id="current_password" name="current_password" required="">
                        </div>
                        <span class="error text-danger" id="alert_currentPwd"></span>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Password</label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input class="form-control form-control-md rounded-0 g-py-13 pr-0" type="password" id="password" name="password" required="" />
                        </div>
                    </div>
                </div>
                 <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Confirm Password</label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="id_no" class="form-control form-control-md rounded-0 g-py-13 pr-0" type="password" id="confirm_password" name="confirm_password" required="" />
                        </div>
                        <span class="error text-danger" id="alert_pwd"></span>
                    </div>
                </div>
                <hr class="g-brd-gray-light-v4 g-my-25">

                <div class="text-sm-right">
                    <a class="d-none btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
                    <input class="btn u-btn-primary rounded-0 g-py-12 g-px-25 " value="Save Changes" type="submit">
                </div>
            </form>
        </div>
        <!-- End Others Settings -->
    </div>
    <!-- End Tab panes -->
</div>
<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#current_password').on('change', function () {
            var current_password = $('#current_password').val();
            var profile_id = $('#profile_id').val();

            //alert(profile_id);
            $.ajax({
                dataType: "json",
                url:'<?php echo $baseUrl ?>' + '/profile/change-password', 
                data:{ pwd: current_password, id_user: profile_id },
                type: "POST", 
                success:function(result){
                    $('#alert_currentPwd').html(result.text);
                    console.log(result);
                }
            });
        });   
        $('#confirm_password').on('change', function () {
            if ($('#password').val() != $('#confirm_password').val()) { 
                $('#alert_pwd').html('Retype Password Not Match!').css('color', 'red');
            }else{
                $('#alert_pwd').html('');
            }
        });

        //remove alert
        setTimeout(function(){
            $('.alert').fadeOut(1000);
            // $('.feedback').hide(1000); // you can also try this
        }, 2000);
    });
</script>
<?php $this->endBlock()?>