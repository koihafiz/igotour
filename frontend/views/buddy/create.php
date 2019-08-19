<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Buddy */

$this->title = Yii::t('app', 'Create Buddy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buddies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buddy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
