<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;
use marqu3s\summernote\Summernote;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'i Go Tour');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['project']];
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
            <a class="nav-link g-py-10 active" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3" role="tab">Event With Buddy</a>
        </li>
    </ul>
    <!-- End Nav tabs -->

    <!-- Tab panes -->
    <div id="nav-1-1-default-hor-left-underline" class="tab-content">
        <!-- Others Settings -->
        <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--3" role="tabpanel" data-parent="#nav-1-1-default-hor-left-underline">
            <div class="row">
                <div class="col-lg-3 g-mb-40 g-mb-0--lg">
                    <!-- User Image -->
                    <div class="g-mb-20">
                        <img class="img-fluid w-100" src="/uploads/avatar/user.png" alt="Image Description">
                    </div>
                    <!-- User Image -->

                    <!-- User Contact Buttons -->
                    <a class="btn btn-block u-btn-outline-primary g-rounded-50 g-py-12 g-mb-10" href="#!">
                        <i class="icon-user-follow g-pos-rel g-top-1 g-mr-5"></i> Accept Buddy
                    </a>
                    <!-- End User Contact Buttons -->
                </div>

                <div class="col-lg-9">
                    <!-- User Details -->
                    <div class="d-flex align-items-center justify-content-sm-between g-mb-5">
                        <h2 class="g-font-weight-300 g-mr-10">< traveler Name ></h2>
                    </div>
                    <p class="lead g-line-height-1_8">
                        About elementum tincidunt massa,<br />
                        No 1213, Road 3, Tower 56<br />
                        98787 Kajang, Malaysia.<br />
                    </p>
                    <!-- End User Details -->

                    <hr class="g-brd-gray-light-v4 g-my-20">
                    <h4>Details:</h4>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br>

                    <!-- User Skills -->
                    <div class="d-flex flex-wrap text-center d-none">
                        
                    </div>
                    <!-- End User Skills -->
                </div>
            </div>
        </div>
        </div>
        <!-- End Others Settings -->
    </div>
    <!-- End Tab panes -->
</div>
<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">
    
</script>
<?php $this->endBlock()?>