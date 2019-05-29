<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;
use marqu3s\summernote\Summernote;
use yii\widgets\ActiveForm;
use common\models\StateService;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Edit Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$myProfile = Yii::$app->user->identity->profile;

?>
<style>
    .form-control:disabled, .form-control[readonly] {
        background-color : #f9fcff;
    }
    .chosen-single span {
        color: #555;
    }

    .asterisk{
        font-size: 10px;
    }
</style>

<div class="col-lg-9">
    <!-- Nav tabs -->
    <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
        <li class="nav-item">
            <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--2" role="tab">Profile</a>
        </li>
    </ul>
    <!-- End Nav tabs -->

    <!-- Tab panes -->
    <div id="nav-1-1-default-hor-left-underline" class="tab-content">
        <!-- Profile Edit -->
        <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--2" role="tabpanel" data-parent="#nav-1-1-default-hor-left-underline">
            <h2 class="h4 g-font-weight-300">Profile Details</h2>
            <p class="g-mb-25">Manage your details information. Asterisk (*) is compulsory field.</p>
            <?=$alert_msg != null ? "
                <div class='alert alert-".$class_alert."'>
              ".$alert_msg."
            </div>" : '';?>
            <form method="post" action="<?=Url::toRoute('profile/edit')?>" enctype='multipart/form-data'>
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                <?php //if($myProfile):?>
                    <input type="hidden" name="profile_id" value="<?=($myProfile)? $myProfile->id : '';?>">
                    <input type="hidden" name="tab" value="profile">
                <?php //endif;?>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Full Name <span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="username" class="form-control form-control-md rounded-0 pr-0" style="color: #242424" type="text" value="<?=Yii::$app->user->identity->username?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Email Address<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" style="color: #242424" value="<?=Yii::$app->user->identity->email?>" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text g-bg-white g-color-gray-light-v1 rounded-0"><i class="icon-lock"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">About Me<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <textarea name="about_me" id="about_me" class="form-control form-control-md  rounded-0 pr-0" required /><?=($myProfile)? $myProfile->about_me:''?></textarea>
                        </div>
                        <span class="error text-danger" id="alert_idNo"></span>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Identity No./ Passport No.<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="id_no" id="id_no" class="form-control form-control-md rounded-0 pr-0" value="<?=($myProfile)? $myProfile->id_no:''?>" type="text" required />
                        </div>
                        <span class="error text-danger" id="alert_idNo"></span>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Date Of Birth<span class="asterisk">*</span></label>
                    <div class="col-sm-4">
                        <div class="input-group" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                            <input name="dob" id="dob" class="form-control form-control-md border-right-0 rounded-0 pr-0 " type="text" value="<?=($myProfile)? $myProfile->dob:''?>" />
                            <label class="input-group-addon btn form-control form-control-md rounded-0 col-sm-2" for="dob">
                               <span class="fa fa-calendar " id="dob"></span>
                            </label>
                        </div>
                        <span class="error text-danger" id="alert_idNo"></span>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Gender<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus"><!-- problem required bila letak class ="js-custom-select"-->
                            <select required name="gender" id="gender" class=" u-select-v1 g-brd-gray-light-v2 g-color-gray-dark-v5 w-50 g-pt-11 g-pb-10" style="width: 47% !important" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up" >
                                <option value="">-- Please Select --</option>
                                <option <?=($myProfile && $myProfile->gender == '1')?'selected':''?> value="1">Male</option>
                                <option <?=($myProfile && $myProfile->gender == '2')?'selected':''?> value="2">Female</option>
                            </select>
                        </select>
                        </div>
                        <span class="error text-danger" id="alert_gender"></span>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Language (Fluent In)<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="language" id="language" class="form-control form-control-md rounded-0 pr-0" type="text" value="<?=($myProfile)? $myProfile->language:''?>" placeholder="English, Bahasa Melayu, Chinese">
                        </div>
                        <span class="error text-danger" id="alert_idNo"></span>
                    </div>
                </div>                
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Address<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <textarea name="update_address" class="form-control form-control-md border-right-0 rounded-0 pr-0" rows="2" placeholder="Home Address" required><?=($myProfile)? $myProfile->address:''?></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text g-bg-white g-color-gray-light-v1 rounded-0"><i class="icon-lockzz"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Postcode/City<span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="update_postcode" id="update_postcode" maxlength="5" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" value="<?=($myProfile)? $myProfile->postcode:''?>" placeholder="Postcode" required>
                            <input name="update_city" class="form-control form-control-md border-right-0 rounded-0 pr-0" type="text" value="<?=($myProfile)? $myProfile->city:''?>" placeholder="City" required >
                            <div class="input-group-append">
                                <span class="input-group-text g-bg-white g-color-gray-light-v1 rounded-0"><i class="icon-lockzz"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .u-select-v1 .chosen-drop {
                        margin-left:-15px;
                    }
                </style>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">State/Country <span class="asterisk">*</span></label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus"><!-- problem required bila letak class ="js-custom-select"-->
                            <select name="update_state" id="update_state" class="u-select-v1 border-right-0 g-brd-gray-light-v2 g-color-gray-dark-v5 w-50 g-pt-11 g-pb-10" style="width: 47% !important" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up" required >
                                <option value="">-- Please Select --</option>
                                <?php foreach($state as $value) { ?>
                                    <option <?=($myProfile && $myProfile->state == $value['id'])?'selected':''?>  value="<?=$value['id']?>"><?=$value['name']?></option>
                                <?php }?>
                             </select>
                            <input name="update_country" id="update_country" class="form-control form-control-md rounded-0 pr-0" type="text" value="<?=($myProfile)? $myProfile->country:''?>">
                        </div>
                        <span class="error text-danger" id="alert_state"></span>
                    </div>
                </div>
                <hr />
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Others </label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <textarea name="others" class="form-control form-control-md border-right-0 rounded-0 pr-0" rows="2"><?=($myProfile)? $myProfile->others:''?></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text g-bg-white g-color-gray-light-v1 rounded-0"><i class="icon-lockzz"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Upload Identity Card</label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="identity_card" id="identity_card" class="form-control form-control-md rounded-0 pr-0" type="file" >
                        </div>
                        <?=!empty($myProfile->identity_card) ? "<a href='".$myProfile->identity_card."' target='_blank'>My Identity Card</a>" :''; ?>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Upload License</label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="license" id="license" class="form-control form-control-md rounded-0 pr-0" type="file" >
                        </div>
                         <?=!empty($myProfile->license) ? "<a href='".$myProfile->license."' target='_blank'>My License</a>" :''; ?>
                    </div>
                </div>
                <div class="form-group row g-mb-25">
                    <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Upload Car Insurance</label>
                    <div class="col-sm-9">
                        <div class="input-group g-brd-primary--focus">
                            <input name="insurance" id="insurance" class="form-control form-control-md rounded-0 pr-0" type="file" >
                        </div>
                         <?=!empty($myProfile->insurance) ? "<a href='".$myProfile->insurance."' target='_blank'>My Car Insurance</a>" :''; ?>
                    </div>
                </div>
                <hr class="g-brd-gray-light-v4 g-my-25">
                
                <div class="text-sm-right">
                    <a class="d-none btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
                    <?php if($user_service){?>
                        <input class="btn u-btn-blue rounded-0 g-py-12 g-px-25" value="Save Changes" type="submit" id="submit" name="btnSubmit">
                    <?php } ?>
                    <input class="btn u-btn-primary rounded-0 g-py-12 g-px-25" value="Save & Next : Add Service" type="submit" name="btnSubmitNext">
                    
                </div>
            </form>
        </div><!-- /Profile Edit -->
    </div><!-- End Tab panes -->    
</div><!-- /col-lg-9 -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">
    $(document).ready(function() {
        $( "#dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "c-100:c+0",
        });

        $("#update_postcode").inputFilter(function (value) {
            return /^\d*$/.test(value);
        });


        $('#update_state').change(function() {
            //alert(this.value);
            $('#update_country').val('Malaysia');
        });

        $('#id_no').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $('#id_no').change(function() {
            var count = $("#id_no").val().length;

            if(count < 5){
                $('#alert_idNo').html('Identity No./ Passport No. should contain at least 5 characters.').css('color', 'red');
            }else{
                $('#alert_idNo').html('');
            }

            //$('#alert_idNo').html('Identity No./ Passport No. already exits!').css('color', 'red');
        });

        //remove alert
        /*setTimeout(function(){
            $('.alert').fadeOut(1000);
            // $('.feedback').hide(1000); // you can also try this
        }, 2000);*/
    });

</script>
<?php $this->endBlock()?>