<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Profile;
use marqu3s\summernote\Summernote;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Curlect Response');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['invite-friends']];
$this->params['breadcrumbs'][] = $this->title;

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
            <?php if($data)
                var_dump($data);
            ?>
            <h2 class="h4 g-font-weight-300">Share Your Link To Your Friends</h2>
            <p class="mb-40">Sed feugiat porttitor nunc, non dignissim ipsum vestibulum in. Donec in blandit dolor. Vivamus a fringilla lorem, vel faucibus ante. Nunc ullamcorper, justo a iaculis elementum, enim orci viverra eros, fringilla porttitor lorem eros vel odio.</p>
        </div>
        <!-- End Tab panes -->
    </div>
<?php $this->beginBlock('JsBlock') ?>
    <script type="text/javascript">
        function myFunction() {

        }
    </script>
<?php $this->endBlock()?>