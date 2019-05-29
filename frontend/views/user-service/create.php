<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserService */

$this->title = Yii::t('app', 'Create User Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
