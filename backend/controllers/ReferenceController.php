<?php

namespace backend\controllers;

use Yii;
use common\models\Reference;
use common\models\ReferenceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ReferenceController extends Controller
{

    public function actionIndex()
    {
    	$searchModel = new ReferenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => '',
        ]);
    }

    public function actionCreate()
    {
        
        $letters='QWERTYUIOPLKJHGFDSAZXCVBNM';  // selection of a-z
        $string='';  // declare empty string
        for($x=0; $x<3; ++$x){  // loop three times
            $string.=$letters[rand(0,25)].rand(0,9);  // concatenate one letter then one number
        }

        //check exits
        if(Reference::find()->where(['reference'=>$string])->one()){
            for($x=0; $x<3; ++$x){  // loop three times
                $string.=$letters[rand(0,25)].rand(0,9);  // concatenate one letter then one number
            } 
        }   
        //echo $string;    
        
        $model = new Reference();
        $model->reference = $string;
        $model->save();

        $searchModel = new ReferenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'message' => "Success :: Reference $string added!"
        ]);


        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Reference::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    

}