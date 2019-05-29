<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StateService */

$this->title = Yii::t('app', 'Create State Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'State Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="state-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
