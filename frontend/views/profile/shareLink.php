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
            <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3" role="tab">Invite Buddy Partners</a>
        </li>
    </ul>
    <!-- End Nav tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
        <h2 class="h4 g-font-weight-300">Share Your Link To Your Friends</h2>
        <p class="mb-40">Sed feugiat porttitor nunc, non dignissim ipsum vestibulum in. Donec in blandit dolor. Vivamus a fringilla lorem, vel faucibus ante. Nunc ullamcorper, justo a iaculis elementum, enim orci viverra eros, fringilla porttitor lorem eros vel odio.</p>
        <!-- Others Settings -->
        <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--3" role="tabpanel" data-parent="#nav-1-1-default-hor-left-underline">
            <div class="container">
               <div class="row">
                   <div class="col-lg-4 col-md-5 g-mb-30 ">
                        <!-- Article -->
                        <div class=" text-center d-block" href="#">
                            <img class="g-mb-10 g-top-5 g-left-0 g-pa-10" src="/uploads/icon/flaticon/share.png" alt="Image description">

                            <!-- Article Content -->
                            <div class=" g-pa-20">
                                <div>
                                    <h4>Share your link</h4>
                                    <small>with your friends via email, Facebook, Twitter and more!</small>
                                </div>
                            </div>
                        <!-- End Article Content -->
                        </div>
                        <!-- End Article -->
                    </div>
                     <div class="col-lg-4 col-md-6 g-mb-30 ">
                         <!-- Article -->
                        <div class=" text-center d-block" href="#">
                            <img class="g-mb-10 g-top-5 g-left-0 g-pa-10" src="/uploads/icon/flaticon/sign_up.png" alt="Image description">

                            <!-- Article Content -->
                            <div class=" g-pa-20">
                                <div>
                                    <h4>Friend Signs</h4>
                                    <small>Bla bla Bla bla Bla bla Bla bla Bla bla Bla bla Bla bla </small>
                                </div>
                            </div>
                        <!-- End Article Content -->
                        </div>
                        <!-- End Article -->
                    </div>
                     <div class="col-lg-4 col-md-6 g-mb-30">
                         <!-- Article -->
                        <div class=" text-center d-block" href="#">
                            <img class="g-mb-10 g-top-5 g-left-0 g-pa-10" src="/uploads/icon/flaticon/gift.png" alt="Image description">

                            <!-- Article Content -->
                            <div class="g-pa-20">
                                    <h4>You Get Bonus</h4>
                                    <small>When you friends Sign up through your link will get bonus.</small>
                                </div>
                            </div>
                        <!-- End Article Content -->
                        </div>
                        <!-- End Article -->
                    </div>
            </div><!-- End Container -->

            <h4>Share your referral link:</h4>
            <form>
              <div class="input-group mb-3">
                  <input class="form-control form-control-md rounded-0 g-py-13 pr-0" type="text" id="copy_link" name="copy_link" 
                  value="<?="http://$_SERVER[HTTP_HOST]".Url::to(['site/signup', 'codedeparrainage' => Yii::$app->user->identity->reference_code]);?>">
                  <div class="input-group-append">
                    <button class="btn btn-danger mb1 black bg-aqua" type="button" onclick="myFunction()">Copy Link</button>
                  </div>
                </div>
            </form>

            <hr />

            <!--<h4>Send it to your friend's email:</h4>
            <form>
              <div class="input-group mb-3">
                  <input type="text" class="form-control form-control-md rounded-0 g-py-13 pr-0" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-info mb1 bg-teal" type="button" >Invite Now</button>
                  </div>
                </div>
            </form>

            <hr />
            <h4>Or Share Via:</h4>
             <div class="container">
                <div class="row">
                   <div class="col-lg-6">
                        <a href="https://twitter.com/share?url=http://www.bootstrapbeginners.com/twitter-button/" title="Twitter" class="btn btn-twitter btn-lg" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false" style="width:100%; margin-top:10px;" ><i class="fa fa-twitter fa-fw"></i> Twitter</a>
                   </div>
                   <div class="col-lg-6 ">
                        <a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://www.example.com&p[images][0]=&p[title]=Title%20Goes%20Here&p[summary]=Description%20goes%20here!" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false"><button style="width:100%; margin-top:10px;" type="button" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-2"></i> Share on Facebook</button></a>
                   </div>
                </div>-->
               
               
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