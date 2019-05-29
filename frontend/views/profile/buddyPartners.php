<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;
use marqu3s\summernote\Summernote;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Invite Friends');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['invite-friends']];
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

    .btn-facebook {
        color: #fff;
        background-color: #4C67A1;
    }
    .btn-facebook:hover {
        color: #fff;
        background-color: #405D9B;
    }
    .btn-facebook:focus {
        color: #fff;
    }
    .btn-twitter {
      background-color: #00ACEE;
      color: #fff;
    }
    .btn-twitter:link, .btn-twitter:visited {
      color: #fff; 
    }
    .btn-twitter:active, .btn-twitter:hover {
      background: #0075a2;
      color: #fff; 
    }
</style>

<div class="col-lg-9">
    <!-- Nav tabs -->
    <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left-underline" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
       
        <li class="nav-item">
            <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3" role="tab">My Buddy Partners </a>
        </li>
    </ul>
    <!-- End Nav tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
        <h2 class="h4 g-font-weight-300">My Buddy (<?=$ref_code?>)</h2>
        <p class="mb-40">Sed feugiat porttitor nunc, non dignissim ipsum vestibulum in. Donec in blandit dolor. Vivamus a fringilla lorem, vel faucibus ante. Nunc ullamcorper, justo a iaculis elementum, enim orci viverra eros, fringilla porttitor lorem eros vel odio.</p>
        <!-- Others Settings -->
        <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--3" role="tabpanel" data-parent="#nav-1-1-default-hor-left-underline">
             <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                <h3 class="h6 mb-0">
                    <i class="icon-directions g-pos-rel g-top-1 g-mr-5"></i> My Buddy List
                </h3>
            </div>

            <div class="card-block g-pa-0">
                <!-- Product Table -->
                <div class="table-responsive">
                    <table class="table table-bordered u-table--v2">
                        <thead class="text-uppercase g-letter-spacing-1">
                        <tr>
                            <th class="g-font-weight-500 g-color-black">Buddy Name</th>
                            <th class="g-font-weight-500 g-color-black g-min-width-200">Locations</th>
                            <th class="g-font-weight-500 g-color-black">Contacts</th>
                            <th class="g-font-weight-500 g-color-black">Details</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php  foreach($user as $key => $value){
                        ?>
                        <tr>
                            <td class="align-middle">
                                <h4 class="h6 g-mb-2"> <?=$value->username;?></h4>
                            </td>
                            <td class="align-middle">
                              <?php $profile=Profile::findOne($value->id);?>
                                <div class="d-flex">
                                    <i class="icon-location-pin g-font-size-18 g-color-gray-dark-v5 g-pos-rel g-top-5 g-mr-7"></i>
                                    <span><?php echo $profile ? $profile->address : 'Not Set';?></span>
                                </div>
                            </td>
                            <td class="align-middle text-nowrap">
                              <span class="d-block g-mb-5">
                                <i class="icon-phone g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> <?=$value->phone? $value->phone : '-';?>
                              </span>
                              <span class="d-block">
                                <i class="icon-envelope g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i> <?=$value->email;?>
                              </span>
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-block u-btn-blue" href="#">
                                    <i class="fa fa-eye g-mr-5"></i> View
                                </a>
                            </td>
                        </tr>
                      <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Product Table -->
            </div>
                 
               
        </div>
        <!-- End Others Settings -->
    </div>
    <!-- End Tab panes -->
</div>
<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">
    function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("copy_link");

      /* Select the text field */
      copyText.select();

      /* Copy the text inside the text field */
      document.execCommand("copy");

      /* Alert the copied text */
      alert("Copied the text: " + copyText.value);
    }
</script>
<?php $this->endBlock()?>