<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Services */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'price',
            [
                'attribute'=>'image_file',
                'label'=>'Logo',
                'format'=>'raw',

                 'value' => function ($data) {
                    
                        if(!empty($data->image_file)) { $img = $data->image_file ; } else{ $img = 'uploads/image_file/services/no_image.jpg'; }

                        return Html::img("/".$img, ['alt'=>"$data->title",'width'=>'150','height'=>'150']);
                 }
            ],
            [
                'attribute'=>'status',
                'label'=>'Status',
                'format'=>'raw',
                'value' => function ($data) {
                        return $data->status == 10 ? 'Active' : 'Deactivate';
                 }

            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
