<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
	<?=$alert['error'] == true? $alert['msg']: '';?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'phone')->textInput() ?>
    <?= $form->field($model, 'user_status')->dropDownList(['0' => 'Members', '2'=> 'Sub Master Buddy', '1'=> 'Master Buddy',], ['disabled' => 'disabled']) ?>
    <?= $form->field($model, 'reference_code')->textInput(['id'=>'ref_code',  'maxlength'=> 6]) ?>
    <?= $form->field($model, 'status')->dropDownList(['10'=>'Active', '0'=> 'Deactivate']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
