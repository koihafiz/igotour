<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Our Services');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Services'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
//            'description:ntext',
            'price:currency',
            [
                'attribute'=>'image_file',
                'label'=>'Logo',
                'format'=>'raw',

                 'value' => function ($data) {

                        if(!empty($data->image_file)) { $img = $data->image_file ; } else{ $img = 'uploads/image_file/services/no_image.jpg'; }

                        return Html::img("/".$img, ['alt'=>"$data->title",'width'=>'50','height'=>'50']);
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
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
