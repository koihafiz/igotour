<?php

namespace backend\controllers;

use Yii;
use common\models\Services;
use common\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Services models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Services model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Services();
        $request = Yii::$app->request;
        if($request->isPost){

            $image_file = UploadedFile::getInstance($model, 'image_file');
            $model->status = $_POST['Services']['status'];
            $model->save(false);

            $res = str_replace(array('/', ' ', ','), array('_', '_', ''), $_POST['Services']['title']);
            $img = 'uploads/image_file/services/' . $model->id . '_'.$res.'.' . $image_file->extension;  

            $model->title = $_POST['Services']['title'];
            $model->description = $_POST['Services']['description'];
            $model->price = $_POST['Services']['price'];
            $model->image_file = $img;
            $model->save();

            //if ($model->image_file && $model->validate()) { 
                $image_file->saveAs($img);
            //} 
            return $this->redirect(['view', 'id' => $model->id]);
        }
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Services model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image_file;
        //print_r($oldImage);die();

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/
        if ($model->load(Yii::$app->request->post())) {

            //get picture data and save it
            $image_file = UploadedFile::getInstance($model, 'image_file');

            if($image_file) {
                if(file_exists($model->image_file)){
                    unlink(Yii::getAlias('@backend/web/') . $oldImage);
                }
                $res = str_replace(array('/', ' ', ','), array('_', '_', ''), $_POST['Services']['title']);
                //die($res);
                $img = 'uploads/image_file/services/' . $model->id . '_'.$res.'.' . $image_file->extension;  
  
                $image_file->saveAs($img);
                $model->image_file = $img;
               
            } else {
                $model->image_file = $oldImage;
            }
            
            $model->status= $_POST['Services']['status'];
            $model->title = $_POST['Services']['title'];
            $model->description = $_POST['Services']['description'];
            $model->price = $_POST['Services']['price'];
            $model->save();

            return $this->redirect(['index']);
        } 

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Services model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image_file;
        
        if(file_exists($model->image_file)){
            unlink(Yii::getAlias('@backend/web/') . $oldImage);
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
