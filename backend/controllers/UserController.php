<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use common\models\Reference;
use common\models\UserService;
use common\models\Profile;
use common\models\StateService;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/

        $error =  false;
        $msg = '';

        $request = Yii::$app->request;

        if(Yii::$app->request->post()){
            $username = $request->post('User')['username'];
            $email = $request->post('User')['email'];
            $phone = $request->post('User')['phone'];
            $status = $request->post('User')['status'];
            $ref_code = $request->post('User')['reference_code'];
            //check email
            if($model->email != $email){
                //check email
                $user = User::findByEmail($email);
                if($user){
                    $error =  true;
                    $msg = '<div class="alert alert-danger fade in" role="alert">
                              Warning! Email already exits. Please try another.
                            </div>';
                }else{
                    $model->email = $email;
                }

            }

            //check referal code
            if($ref_code){
                //check either user is master or not
                if($model->reference_code == $ref_code){
                    $error = true;
                    $msg = '<div class="alert alert-danger fade in" role="alert">
                              Warning! Reference Code for this buddy already MasterBuddy. Please don\'t change it.
                            </div>';
                }else{
                    $model_ref = Reference::findByCode($ref_code);

                    if($model_ref['status'] != 'Fail'){
                        $model->reference_code = $model_ref['refCode'];
                        $model->user_status = $model_ref['user_status'];

                        if($model_ref['status'] == 'MasterBuddy'){
                            $model_update = Reference::findIdentityCode($ref_code);
                            $model_update->user_id = $model->id;
                            $model_update->save();
                        }
                    }
                    $error =  true;
                    $msg = '<div class="alert alert-success fade in" role="alert">
                      Success! Update perfectly.
                    </div>';    
                    
                }
            }
            $model->username = $username;
            $model->phone = $phone;
            $model->status = $status;
            $model->save();
        }

        return $this->render('update', [
            'model' => $model,
            'alert' => ['error'=> $error, 'msg'=> $msg]
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //check table ref
        $ref = Reference::findOne(['user_id'=>$id]);
        if($ref){
          $ref->delete();
        }
        //check table profile
        Profile::findOne(['user_id'=>$id]);
        
        //check table user service id
        UserService::deleteAll(['user_id'=>$id]);

        //check  table state_service
        StateService::deleteAll(['user_id' => $id]);

        return $this->redirect(['index']);
    }


    public function actionResetPassword($id)
    {
        $model= User::findOne($id);
        $model->setPassword('iGoTour2019');
        $model->save();
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}