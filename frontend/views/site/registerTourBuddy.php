<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use marqu3s\summernote\Summernote;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .g-bg-white
    {
        background-color: rgba(255, 255, 255, 1) !important;
    }
    footer {
        display: none;
    }
    .help-block-error {
        color: #ff1d6c;
    }
    .note-editable {
        line-height: .7;
    }
    .note-popover {
        display: none;
    }

    .row {
        flex-wrap: nowrap;
    }
</style>

<section class="g-min-height-100vh g-flex-centered g-bg-img-hero g-bg-pos-top-center" style="background-image: url(/assets_unify_262/img-temp/1920x1080/img2-2.jpg);">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 col-xs-12 col-lg-8">
                <div class="u-shadow-v24 g-bg-white rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Register As Tour Buddy</h2>
                    </header>
                    <div class="row">
                        <div class="col-md-4"><b><?=Yii::$app->user->identity->username?></b></div>
                        <div class="col-md-4"><b><?=Yii::$app->user->identity->email?></b></div>
                        <div class="col-md-4"><b><?=Yii::$app->user->identity->phone?></b></div>
                    </div>

                    <!-- Form -->
                    <!--                    <form class="g-py-15">-->
                    <?php $form = ActiveForm::begin(['class' => 'g-py-15']); ?>
                    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Your Avatar</label>
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="email" placeholder="John">
                        </div>

                        <div class="col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Website Link (if any)</label>
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="tel" placeholder="Doe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Home dasfdafssd</label>
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="email" placeholder="John">
                        </div>

                        <div class="col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Home RRRRR</label>
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="tel" placeholder="Doe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Home dasfdafssd</label>
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="email" placeholder="John">
                        </div>

                        <div class="col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Home RRRRR</label>
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="tel" placeholder="Doe">
                        </div>
                    </div>

                    <p><label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Choose Services</label></p>
                    <?php foreach($services as $serve):?>
                        <div class="col-md-6">
                            <div class="form-group g-mb-10">
                                <label class="u-check g-pl-25">
                                    <input name="services[]" value="<?=$serve->id?>" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" checked="" type="checkbox">
                                    <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                        <i class="fa" data-check-icon=""></i>
                                    </div>
                                    <?=$serve->title?>
                                </label>
                            </div>
                        </div>
                    <?php endforeach;?>

                    <div class="g-mb-35">
                        <div class="row justify-content-between">
                            <div class="col-12 align-self-center text-center">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-md u-btn-primary rounded g-py-13 g-px-25', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <!-- End Form -->

                    <footers class="text-center hidden-xs-up d-none">
                        <p style="color: red" class="g-color-gray-dark-v5 g-font-size-13 mb-0">Suddenly Remembered? <a class="g-font-weight-600" href="<?=Url::to('/site/login')?>">login</a></p>
                    </footers>
                </div>
            </div>
        </div>
    </div>
</section>
