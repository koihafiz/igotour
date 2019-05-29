<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\ReferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'References');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reference-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Generate Reference'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=$message?  "
            <div class='alert alert-success'>
              ".$message."
            </div>" : '';?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reference',
            'user_id',
            'created_at',
            'updated_at',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">
    $(document).ready(function() {
         //remove alert
        setTimeout(function(){
            $('.alert').fadeOut(1000);
            // $('.feedback').hide(1000); // you can also try this
        }, 2000);
    });

</script>
<?php $this->endBlock()?>