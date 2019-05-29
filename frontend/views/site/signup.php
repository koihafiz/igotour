<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .g-bg-white
    {
        background-color: rgba(255, 255, 255, 0.93) !important;
    }
    footer {
        display: none;
    }
    .help-block-error {
        color: #ff1d6c;
    }
</style>
<section class="g-min-height-100vh g-flex-centered g-bg-lightblue-radialgradient-circle" style="background-image: url(/uploads/images/sunrise.jpg);background-size: cover;">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 col-xs-12 col-lg-6">
                <div class="u-shadow-v24 g-bg-white rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Signup</h2>
                    </header>

                    <!-- Form -->
                    <!--                    <form class="g-py-15">-->
                    <?php $form = ActiveForm::begin(['class' => 'g-py-15']); ?>
                    <div class="row">
                        <div class="col-sm">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Full Name</label>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => false,'class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Email</label>
                            <?= $form->field($model, 'email')->input('email',['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Password</label>
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3'])->label(false) ?>
                        </div>
                        <div class="col-sm">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Confirm Password</label>
                            <?= $form->field($model, 'password_repeat')->passwordInput(['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3'])->label(false) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Phone</label>
                            <?= $form->field($model, 'phone')->textInput(['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15'])->label(false) ?>
                        </div>
                        <div class="col-sm">
                            <?php $code = Yii::$app->request->get('codedeparrainage')? explode(':',Yii::$app->request->get('codedeparrainage')) : ''; ?>
                            <label class="g-color-gray-dark-v2 g-font-weight-500 g-font-size-13">Reference Code</label>
                            <?= $form->field($model, 'reference_code')->textInput(['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3', 'maxlength'=>6, 'id'=>'ref_code', 'value' => $code != ''? $code[1]:'', 'readonly'=> $code != '' ? true:false, 'placeholder'=>'If any'])->label(false) ?>
                        </div>
                    </div>

                    <div class="g-mb-35">
                        <div class="row justify-content-between">
                            <div class="col-12 align-self-center text-center">
                                <!--                                    <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="button">Login</button>-->
                                <?= Html::submitButton('Signup', ['class' => 'btn btn-md u-btn-primary rounded g-py-13 g-px-25', 'name' => 'login-button']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <!-- End Form -->

                    <footers class="text-center hidden-xs-up">
                        <p style="color: red" class="g-color-gray-dark-v5 g-font-size-13 mb-0">Suddenly Remembered? <a class="g-font-weight-600" href="<?=Url::to('/site/login')?>">login</a></p>
                    </footers>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->beginBlock('JsBlock') ?>
<script>
    $('#ref_code').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

</script>

<?php $this->endBlock()?>
