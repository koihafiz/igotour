<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .col-md-4 {
        margin-bottom: 29px;
        text-align: center;
    }
</style>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php //= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>

    <?php //= $form->field($model, 'service_id')->hiddenInput(['value' => $service_id])->label(false) ?>

    <?php //= $form->field($model, 'img1')->fileInput() ?>
    <?php //= $form->field($model, 'description')->textarea(['rows' => 2])->label('Your Description about this Service') ?>


<div class="form-group field-userservice-description has-success">
    <label class="control-label" for="userservice-description">Your Description about this Service</label>
    <textarea id="userservice-description" class="form-control" name="description" rows="2" aria-invalid="false"></textarea>
    <div class="help-block"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <label class="control-label" style="display: block;margin-bottom: 1.5rem" for="userservice"><br>Please select all states that you going to serve for this service.</label>
        <?php foreach($state as $stat):?>
            <div class="form-check-inline" style="margin-right: 2.75rem;margin-bottom: 1rem">
                <label class="form-check-label" for="<?=$service_id.$stat->name?>">
                    <input type="checkbox" class="form-check-input" id="<?=$service_id.$stat->name?>" name="state[]" value="<?=$stat->id?>"><?=$stat->name?>
                </label>
            </div>
        <?php endforeach;?>
    </div>
</div>
<div class="row" style="margin-bottom: 21px">
    <div class="col-md-12">
        <label class="control-label" for="userservice-img1"><br>Attach image for this service if any.</label>
        <input type="hidden" name="user_id" value="<?=Yii::$app->user->identity->id?>">
        <input type="hidden" name="service_id" value="<?=$service_id?>">
        <input type="hidden" name="tab" value="service">
        <input type="hidden" name="serviceName" value="<?=$service_name?>">
    </div>
</div>
<div class="row">

    <div class="col-md-4 form-group field-userservice-img1">
        <label class="control-label" for="userservice-img1">Image 1</label><br>
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
            <input id="userservice-img1" name="<?=$service_id?>img1" type="file">
            <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
            <span class="js-value">Attach Image 1</span>
        </label>
        <div class="help-block"></div>
    </div>
    <div class="col-md-4 form-group field-userservice-img2">
        <label class="control-label" for="userservice-img2">Image 2</label><br>
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
            <input id="userservice-img2" name="<?=$service_id?>img2" type="file">
            <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
            <span class="js-value">Attach Image 2</span>
        </label>
        <div class="help-block"></div>
    </div>
    <div class="col-md-4 form-group field-userservice-img3">
        <label class="control-label" for="userservice-img3">Image 3</label><br>
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
            <input id="userservice-img3" name="<?=$service_id?>img3" type="file">
            <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
            <span class="js-value">Attach Image 3</span>
        </label>
        <div class="help-block"></div>
    </div>
    <div class="col-md-4 form-group field-userservice-img4">
        <label class="control-label" for="userservice-img4">Image 4</label><br>
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
            <input id="userservice-img4" name="<?=$service_id?>img4" type="file">
            <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
            <span class="js-value">Attach Image 4</span>
        </label>
        <div class="help-block"></div>
    </div>
    <div class="col-md-4 form-group field-userservice-img5">
        <label class="control-label" for="userservice-img5">Image 5</label><br>
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
            <input id="userservice-img5" name="<?=$service_id?>img5" type="file">
            <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
            <span class="js-value">Attach Image 5</span>
        </label>
    </div>
    <div class="col-md-4 form-group field-userservice-img6">
        <label class="control-label" for="userservice-img6">Image 6</label><br>
        <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
            <input id="userservice-img6" name="<?=$service_id?>img6" type="file">
            <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
            <span class="js-value">Attach Image 6</span>
        </label>
        <div class="help-block"></div>
    </div>
</div>


    <div class="form-group" style="text-align: center;">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn u-btn-primary rounded-0 g-py-12 g-px-25']) ?>
    </div>

    <?php ActiveForm::end(); ?>

