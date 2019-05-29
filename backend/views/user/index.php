<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'phone',
            //'status',
            [
                'attribute'=>'status',
                'header'=>'Status',
                'filter' => ['Y'=>'Active', 'N'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model, $key, $index)
                {   
                    if($model->status == '10')
                    {
                        return 'Active';
                    }
                    else
                    {   
                        return 'Deactivate';
                    }
                },
            ],
            [
                'attribute'=>'reference_code',
                'value' => function($model, $key, $index)
                {   
                    if($model->reference_code == '')
                    {
                        return 'Administrator';
                    }else{
                        return $model->reference_code;
                    }
                },
            ],
            [
                'attribute'=>'created_at',
                'format' => ['date', 'php:d-m-Y'],
            ],
            [
                'attribute'=>'updated_at',
                'format' => ['date', 'php:d-m-Y'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{view}{update}{delete}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>