<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use common\models\Profile;
use common\models\UserService;

$assets = AppAsset::register($this);

$logo_link = '/assets_unify_262/img/logo/main_logo.png';
$logo_link_footer = '/assets_unify_262/img/logo/main_logo_black.png';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700,800|Roboto:400,700">
    <?php $this->head() ?>
    <style>
        .u-header__section {
            background-color: rgba(49, 53, 62, 0.8) !important;
        }
        .navbar-nav .nav-item .nav-link:hover, .navbar-nav .nav-item.active .nav-link {
            color:rgb(255, 247, 20);
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<?php
    $userProfile = Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
?>
<main>
    <?= $this->render('header'); ?> 
    <section class="g-pt-90" style="margin-bottom:5em">
        <div class="container">
            <div class="row">
                <!-- Profile Sidebar -->
                <div class="col-lg-3 g-mb-50 g-mb-0--lg">
                    <!-- User Image -->
                    <div class="u-block-hover g-pos-rel" style="min-height: 251px">
                        <figure>
                            <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="<?=($userProfile && $userProfile->avatar != '')? $userProfile->avatar.'?='.Date('U') : '/uploads/avatar/no_image.png'?>" style="" alt="<?=Yii::$app->user->identity->username?>">
                        </figure>

                        <!-- Figure Caption -->
                        <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
                            <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
                                <!-- Figure Social Icons -->
                                <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
                                    <li class="list-inline-item align-middle g-mx-7" onclick="selectAvatar()" data-toggle="tooltip" data-placement="top" title="Change your profile picture">
                                        <a class="u-icon-v1 u-icon-size--md g-color-white" href="#">
                                            <i class="icon-note u-line-icon-pro"></i>
                                        </a>
                                    </li>

                                    <form id="change_avatarForm" method="post" action="<?=Url::toRoute('/profile/edit')?>" enctype="multipart/form-data" class="d-none">
                                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                        <input type="file" name="avatar_inputform" id="avatar_inputform">
                                        <input type="hidden" name="tab" value="avatar">
                                    </form>
                                </ul>
                                <!-- End Figure Social Icons -->
                            </div>
                        </figcaption>
                        <!-- End Figure Caption -->

                        <!-- User Info -->
                        <span class="g-pos-abs g-top-20 g-left-0">
                          <a class="btn btn-sm u-btn-primary rounded-0" href="#"><?=Yii::$app->user->identity->username?></a>
                          <!--<small class="d-block g-bg-black g-color-white g-pa-5">Project Manager</small>-->
                        </span>
                        <!-- End User Info -->
                    </div><!-- /User Image -->

                    <!-- Sidebar Navigation -->
                    <div class="list-group list-group-border-0 g-mb-40">
                        <!-- Overall -->
                        <a href="page-profile-main-1.html" class="d-none list-group-item justify-content-between active">
                            <span><i class="icon-cursor g-pos-rel g-top-1 g-mr-8"></i> Overall</span>
                            <span class="u-label g-font-size-11 g-bg-white g-color-main g-rounded-20 g-px-10">2</span>
                        </a>
                        <!-- End Overall -->
                        <?php 

                        $router = Yii::$app->requestedRoute;

                        ?>
                        <!--<a href="<?//=Url::toRoute('profile/index')?>" class="list-group-item list-group-item-action justify-content-between <?//=($router == 'profile/index') ? 'active' : '';?>">
                            <span><i class="icon-speedometer g-pos-rel g-top-1 g-mr-8"></i> My Dashboard</span>
                        </a>-->

                        <!-- Profile -->
                        <a href="<?=Url::toRoute('profile/edit/')?>" class="list-group-item list-group-item-action justify-content-between <?=($router == 'profile/edit') ? 'active' : '';?>">
                            <span><i class="icon-home g-pos-rel g-top-1 g-mr-8"></i> My Profile</span>
                        </a>
                        <!-- End Profile -->
                        <a href="<?=Url::toRoute('profile/add-new-services/')?>" class="list-group-item list-group-item-action justify-content-between <?=($router == 'profile/add-new-services') ? 'active' : '';?>">
                            <span><i class="icon-plus g-pos-rel g-top-1 g-mr-8"></i> Add My New Services</span>
                        </a>
                        <!-- Settings -->
                        <a href="<?=Url::toRoute('profile/registered-services/')?>" class="list-group-item list-group-item-action justify-content-between <?=($router == 'profile/registered-services') ? 'active' : '';?>">
                            <span><i class="icon-settings g-pos-rel g-top-1 g-mr-8"></i> Registered Services</span>
                            <span class="u-label g-font-size-11 g-bg-cyan g-rounded-20 g-px-8">
                                <?php
                                    $service = UserService::find()->where(['user_id' => Yii::$app->user->identity->id])->count();
                                    print_r($service);
                                ?>
                            </span>
                        </a>
                        <!-- End Settings -->
                        <!-- My Projects -->
                        <a href="<?=Url::toRoute('profile/my-event')?>" class="list-group-item list-group-item-action justify-content-between <?=($router == 'profile/my-event') ? 'active' : '';?>">
                            <span><i class="icon-layers g-pos-rel g-top-1 g-mr-8"></i> My Events</span>
                            <span class="u-label g-font-size-11 g-bg-red g-rounded-20 g-px-10">2</span>
                        </a>
                        <!-- End My Projects -->
                        <!-- Invite Friends -->
                        <?php if(Yii::$app->user->identity->user_status != 3) { ?>
                        <a href="<?=Url::toRoute('profile/buddy-partners/')?>" class="list-group-item list-group-item-action justify-content-between <?=($router == 'profile/buddy-partners') ? 'active' : '';?>">
                            <span><i class="icon-people g-pos-rel g-top-1 g-mr-8"></i>My Buddy</span>                           
                        </a>
                        <a href="<?=Url::toRoute('profile/share-link/')?>" class="list-group-item list-group-item-action justify-content-between <?=($router == 'profile/share-link') ? 'active' : '';?>">
                            <span><i class="icon-share g-pos-rel g-top-1 g-mr-8"></i>Share My Link</span>                           
                        </a>
                        <?php } ?>
                        <!-- Change Password -->
                        <a href="<?=Url::toRoute('profile/change-password/')?>" class="list-group-item list-group-item-action justify-content-between <?=($router == 'profile/change-password') ? 'active' : '';?>">
                            <span><i class="icon-lock g-pos-rel g-top-1 g-mr-8"></i> Change Password</span>                           
                        </a>
                        <!-- End Settings -->
                    </div> 
                     


                    <!-- End Sidebar Navigation 
                    <?php //if(Yii::$app->user->identity->user_status != 1) { ?>
                        <i>Reference By (<?//=Yii::$app->user->identity->reference_code;?>)</i>
                    <?php //}?>-->
                    <!-- Project Progress -->
                    <div class="card border-0 rounded-0 g-mb-50">
                        <?php  
                            $myProfile = Yii::$app->user->identity->profile;
                            //echo ($myProfile)? "status is active " : "<i style='color:red' >Please insert your profile image to active your account.<br /><br />Your active account will be appears at page <a href='/site/tour-guides' >Our Tour Guiders</a></i>";
                        ?>
                    </div>
                    <!-- End Project Progress -->
                    
                </div>
                <!-- End Profile Sidebar -->

                <!-- Content -->
                <?= Alert::widget() ?>
                <?= $content ?>
                <!-- /Content -->
            </div>
        </div>
    </section>

    <?= $this->render('footer'); ?> 
    
</main>
<div class="u-outer-spaces-helper"></div>


<?php $this->endBody() ?>

<script>
    $(document).on('ready', function () {

        $('#avatar_inputform').change(function() {
            $('#change_avatarForm').submit();
        });

        /*$('#avatar_inputform').on('change', function () {
            var formData = new FormData($('#change_avatarForm')[0]);
            formData.append('avatar_inputform', $('input[type=file]')[0].files[0]);
            console.log(formData);
            $.ajax({
                url:'<?php echo Yii::$app->request->BaseUrl ?>' + '/profile/ajax-avatar', 
                type: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false,
            })
            .done(function(response) {
                if (response.data.success == true) {
                    console.log(response.data.model);
                }
            })
            .fail(function() {
                console.log("error");
            });
        
        });*/


        //$.HSCore.helpers.HSFocusState.init();
        //$.HSCore.helpers.HSNotEmptyState.init();

        $.HSCore.helpers.HSFileAttachments.init();
        $.HSCore.components.HSFileAttachment.init('.js-file-attachment');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of datepicker
        $.HSCore.components.HSDatepicker.init('.js-datepicker');

        // initialization of custom select
        $.HSCore.components.HSSelect.init('.js-custom-select');

        // initialization of rating
        $.HSCore.components.HSRating.init($('.js-rating'), {
            spacing: 4
        });

        // initialization of go to section
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init( $('.js-scrollbar') );

    });

    $(window).on('load', function() {
        // initialization of HSScrollNav
//        $.HSCore.components.HSScrollNav.init($('#js-scroll-nav'), {
//            duration: 700
//        });

        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');


        // initialization of cubeportfolio
        $.HSCore.components.HSCubeportfolio.init('.cbp');

        setTimeout(function () { // important in this case
            var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
                direction: 'horizontal',
                indicatorSelector: '.js-hr-progress-bar-indicator'
            });
        }, 1);
    });

    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });

    function selectAvatar()
    {
        $('#avatar_inputform').click();
    }

    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
            });
        };
    }(jQuery));

</script>

<?php if(isset($this->blocks['JsBlock'])):?>
    <?=$this->blocks['JsBlock']?>
<?php endif;?>

</body>
</html>
<?php $this->endPage() ?>
