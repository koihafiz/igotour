<?php

namespace frontend\controllers;

use common\models\Services;
use common\models\State;
use common\models\User;
use common\models\StateService;
use common\models\UserService;
use Yii;
use common\models\Profile;
use common\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    public $layout ='profile';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
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
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    public function actionAvatar()
    {   // Yii::$app->response->format = Response::FORMAT_JSON;

        $user_id = Yii::$app->user->identity->id;

        $avatar = UploadedFile::getInstanceByName('avatar_inputform');

        if($avatar)
        {
            $avname = strtolower(Yii::$app->user->identity->username);
            $avname = str_replace(' ', '', $avname);

            //$model_avatar = "/uploads/avatar/".$user_id."_".$avname.".".$avatar->extension;

            $file_name = "/uploads/avatar/". $user_id . "_" . date("Ymd") . '_' . $avatar->baseName . "." .$avatar->extension;

            $isExist = Profile::find()->where(['user_id' => $user_id])->one();

            $required = array('gender', 'dob', 'about_me', 'address', 'postcode', 'city', 'state','country');

            // Loop over field names, m             ake sure each one exists and is not empty
            $status = 0;
            foreach($required as $field) {
              if (!empty($isExist->$field)) {
                //check avatar
                $status = 10;
              }
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            
            if(!$isExist) {
                $model = new Profile();
                $model->user_id = $user_id; 
                $avatar->saveAs(Yii::getAlias('@frontend/web') . $file_name);//$model_avatar);

                if(file_exists(Yii::getAlias('@frontend/web') . $file_name )){
                    $model->avatar = $file_name; 
                    $model->status = $status;
                    $model->save();

                    $text  = 'Success to upload profile picture.';
                }else{
                    $text   = 'Failed to upload profile picture. Please try again.';
                }
               
            }else {
                
                if(file_exists(Yii::getAlias('@frontend/web') . ($isExist->avatar != NULL) ? $isExist->avatar :'' )){
                    unlink(Yii::getAlias('@frontend/web') . $isExist->avatar);
                }

                $avatar->saveAs(Yii::getAlias('@frontend/web') .$file_name);
                if(file_exists(Yii::getAlias('@frontend/web') . $file_name)){
                    $isExist->avatar =  $file_name;
                    $isExist->status = $status;
                    $isExist->save();

                    $text  = 'Success to upload profile picture.';
             
                }else{
                    $text   = 'Failed to upload profile picture. Please try again.';
                }
            }

            return $this->redirect(['edit', 'message'=>$message, 'text'=>$text]);
        }

    }


    public function actionEdit()
    {
        $alert_msg = "";
        $class_alert =  '';
        $request = Yii::$app->request;
        //print_r($request);
        if($request->isPost && $request->post('tab') == 'profile') {
            //update user tbl
            $model_user = User::findOne(Yii::$app->user->identity->id);
            $model_user->username = $request->post('username');
            $model_user->save();

            //update/create profile tbl
            $model = Profile::findOne($request->post('profile_id'));
            // Required field names
            $required = array('gender', 'dob', 'about_me', 'update_address', 'update_postcode', 'update_city', 'update_state','update_country');

            // Loop over field names, make sure each one exists and is not empty  
            foreach($required as $field) {
              if (!empty($request->post($field))) {
                $status = 10;
              }else{
                 $status = '';
              }
            }
            
            $identity_card = UploadedFile::getInstanceByName('identity_card');
            $license = UploadedFile::getInstanceByName('license');
            $insurance = UploadedFile::getInstanceByName('insurance');

            if($model) {
                $model->id_no = $request->post('id_no');
                $model->gender = $request->post('gender');
                $model->dob = $request->post('dob');
                $model->language = $request->post('language');
                $model->about_me = $request->post('about_me');
                $model->address = $request->post('update_address');
                $model->postcode = $request->post('update_postcode');
                $model->city = $request->post('update_city');
                $model->state = $request->post('update_state');
                $model->country = $request->post('update_country');
                $model->status = $status;

                $model->others = $request->post('others');                

                if(!empty($identity_card)){
                    $file_name_identity_card = "/uploads/profile/".Yii::$app->user->identity->id."_identity_card.".$identity_card->extension;
                    if(file_exists(Yii::getAlias('@frontend/web') . ($model->identity_card != NULL) ? $model->identity_card :'' )){
                        unlink(Yii::getAlias('@frontend/web') . $model->identity_card);
                    }
                    $model->identity_card =  $file_name_identity_card;
                    $identity_card->saveAs(Yii::getAlias('@frontend/web') .$file_name_identity_card);
                }

                if(!empty($license)){
                    
                    $file_name_license = "/uploads/profile/". Yii::$app->user->identity->id."_license.".$license->extension;
                    if(file_exists(Yii::getAlias('@frontend/web') . ($model->license != NULL) ? $model->license :'' )){
                        unlink(Yii::getAlias('@frontend/web') . $model->license);
                    }
                    $model->license =  $file_name_license;
                    $license->saveAs(Yii::getAlias('@frontend/web') .$file_name_license);
                }

                if(!empty($insurance)){
                    
                    $file_name_insurance = "/uploads/profile/".Yii::$app->user->identity->id."_insurance.".$insurance->extension;
                    if(file_exists(Yii::getAlias('@frontend/web') . ($model->insurance != NULL) ? $model->insurance :'' )){
                        unlink(Yii::getAlias('@frontend/web') . $model->insurance);
                    }
                    $model->insurance =  $file_name_insurance;
                    $insurance->saveAs(Yii::getAlias('@frontend/web') .$file_name_insurance);
                }
                

                $model->save(true);
                $class_alert =  'success';
                $alert_msg = "Updated success!";

            }else {
                $newModel = new Profile();
                $newModel->user_id = Yii::$app->user->identity->id;
                $newModel->id_no = $request->post('id_no');
                $newModel->gender = $request->post('gender');
                $newModel->dob = $request->post('dob');
                $newModel->language = $request->post('language');
                $newModel->about_me = $request->post('about_me');
                $newModel->address = $request->post('update_address');
                $newModel->postcode = $request->post('update_postcode');
                $newModel->city = $request->post('update_city');
                $newModel->state = $request->post('update_state');
                $newModel->country = $request->post('update_country');

                $newModel->others = $request->post('others');
                
                if($license){
                    $file_name_license = "/uploads/profile/". Yii::$app->user->identity->id."_license.".$license->extension;
                    $newModel->license =  $file_name_license;
                    $license->saveAs(Yii::getAlias('@frontend/web') .$file_name_license);
                }

                if($identity_card){
                    $file_name_identity_card = "/uploads/profile/".Yii::$app->user->identity->id."_identity_card.".$identity_card->extension;
                    $newModel->identity_card =  $file_name_identity_card;
                    $identity_card->saveAs(Yii::getAlias('@frontend/web') .$file_name_identity_card);
                }

                if($insurance){
                    $file_name_insurance = "/uploads/profile/".Yii::$app->user->identity->id."_insurance.".$insurance->extension;
                    $newModel->insurance =  $file_name_insurance;
                    $insurance->saveAs(Yii::getAlias('@frontend/web') .$file_name_insurance);
                }

                $newModel->status = $status;
                $newModel->save(true);
                $class_alert =  'success';
                $alert_msg = "Updated success!";

            }
        }else if($request->isPost && $request->post('tab') == 'avatar') {
            $user_id = Yii::$app->user->identity->id;

            $avatar = UploadedFile::getInstanceByName('avatar_inputform');

            $file_name = "/uploads/avatar/". $user_id . "_" . date("Ymd") . '_' . $avatar->baseName . "." .$avatar->extension;

            $isExist = Profile::find()->where(['user_id' => $user_id])->one();

            $required = array('gender', 'dob', 'about_me', 'address', 'postcode', 'city', 'state','country');

            // Loop over field names, m             ake sure each one exists and is not empty
            $status = 0;
            foreach($required as $field) {
              if (!empty($isExist->$field)) {
                //check avatar
                $status = 10;
              }
            }
            
            if(!$isExist) {
                $model = new Profile();
                $model->user_id = $user_id; 
                $avatar->saveAs(Yii::getAlias('@frontend/web') . $file_name);//$model_avatar);

                if(file_exists(Yii::getAlias('@frontend/web') . $file_name )){
                    $model->avatar = $file_name; 
                    $model->status = $status;
                    $model->save();
                    $class_alert = 'success';
                    $alert_msg  = 'Success to upload profile picture.';
                }else{
                    $class_alert = 'warning';
                    $alert_msg   = 'Failed to upload profile picture. Please try again.';                  
                }
               
            }else {
                if(file_exists(Yii::getAlias('@frontend/web') . ($isExist->avatar != NULL) ? $isExist->avatar :'' )){
                    unlink(Yii::getAlias('@frontend/web') . $isExist->avatar);
                }

                $avatar->saveAs(Yii::getAlias('@frontend/web') .$file_name);
                if(file_exists(Yii::getAlias('@frontend/web') . $file_name)){
                    $isExist->avatar =  $file_name;
                    $isExist->status = $status;
                    $isExist->save();

                    $class_alert = 'success';
                    $alert_msg  = 'Success to upload profile picture.';
             
                }else{
                    $class_alert = 'warning';
                    $alert_msg   = 'Failed to upload profile picture. Please try again.';
                }
            }
        }

        if($request->post('btnSubmitNext')){
            return $this->redirect(['add-new-services']);
        }else{
           return $this->render('edit',[
                'services' => Services::find()->all(),
                'model' => new UserService(),
                'state' => State::find()->all(),
                'user_service' => UserService::find()->where(['user_id' => Yii::$app->user->identity->id])->all(),
                'alert_msg' => $alert_msg,
                'class_alert' => $class_alert
            ]); 
        }

        
    }

    public function actionAddNewServices()
    {
        $alert_msg = "";
        $request = Yii::$app->request;
        if($request->isPost && $request->post('tab') == 'service') {

            $model_service = new UserService();
            $model_service->user_id = $request->post('user_id');
            $model_service->service_id = $request->post('service_id');
            $model_service->description = $request->post('description');

            $img1 = UploadedFile::getInstanceByName($request->post('service_id').'img1');
            $img2 = UploadedFile::getInstanceByName($request->post('service_id').'img2');
            $img3 = UploadedFile::getInstanceByName($request->post('service_id').'img3');
            $img4 = UploadedFile::getInstanceByName($request->post('service_id').'img4');
            $img5 = UploadedFile::getInstanceByName($request->post('service_id').'img5');
            $img6 = UploadedFile::getInstanceByName($request->post('service_id').'img6');

            $imgtitle = strtolower($request->post('serviceName'));
            $imgtitle = str_replace(' ', '', $imgtitle);

            if($img1) {
                $model_img1 = "/uploads/services/".$request->post('user_id')."_1_".$imgtitle.".".$img1->extension;
                $img1->saveAs(Yii::getAlias('@frontend/web') . $model_img1);

                if(file_exists(Yii::getAlias('@frontend/web').$model_img1)) {
                    $model_service->img1 = $model_img1;
                }else{
                    $alert_msg .= "Failed to upload Image 1. ";
                }
            }
            if($img2) {
                $model_img2 = "/uploads/services/".$request->post('user_id')."_2_".$imgtitle.".".$img2->extension;
                
                $img2->saveAs(Yii::getAlias('@frontend/web') . $model_img2);
                if(file_exists(Yii::getAlias('@frontend/web').$model_img2)) {
                    $model_service->img2 = $model_img2;
                }else{
                    $alert_msg .= "Failed to upload Image 2. ";
                }
            }
            if($img3) {
                $model_img3 = "/uploads/services/".$request->post('user_id')."_3_".$imgtitle.".".$img3->extension;
                
                $img3->saveAs(Yii::getAlias('@frontend/web') . $model_img3);
                if(file_exists(Yii::getAlias('@frontend/web').$model_img3)) {
                    $model_service->img3 = $model_img3;
                }else{
                    $alert_msg .= "Failed to upload Image 3. ";
                }
            }
            if($img4) {
                $model_img4 = "/uploads/services/".$request->post('user_id')."_4_".$imgtitle.".".$img4->extension;
                
                $img4->saveAs(Yii::getAlias('@frontend/web') . $model_img4);
                if(file_exists(Yii::getAlias('@frontend/web').$model_img4)) {
                    $model_service->img4 = $model_img4;
                }else{
                    $alert_msg .= "Failed to upload Image 4. ";
                }

            }
            if($img5) {
                $model_img5 = "/uploads/services/".$request->post('user_id')."_5_".$imgtitle.".".$img5->extension;
               
                $img5->saveAs(Yii::getAlias('@frontend/web') . $model_img5);
                if(file_exists(Yii::getAlias('@frontend/web').$model_img5)) {
                     $model_service->img5 = $model_img5;
                }else{
                    $alert_msg .= "Failed to upload Image 5. ";
                }

            }
            if($img6) {
                $model_img6 = "/uploads/services/".$request->post('user_id')."_6_".$imgtitle.".".$img6->extension;
                
                $img6->saveAs(Yii::getAlias('@frontend/web') . $model_img6);
                if(file_exists(Yii::getAlias('@frontend/web').$model_img6)) {
                   $model_service->img6 = $model_img6;
                }else{
                    $alert_msg .= "Failed to upload Image 6. ";
                }

            }

            if($model_service->save())
            {
                $states = $request->post('state');

                if($states):
                    for($k=0;$k<sizeof($states);$k++):
                        $state_servis = new StateService();
                        $state_servis->state_id = (int)$states[$k];
                        $state_servis->service_id = $model_service->service_id;
                        $state_servis->user_id = $model_service->user_id;
                        $state_servis->user_service_id = $model_service->id;
                        $state_servis->save();
                    endfor;
                endif;
            }
        }

        return $this->render('addNewServices',[
            'services' => Services::find()->all(),
            'model' => new UserService(),
            'state' => State::find()->all(),
            'user_service' => UserService::find()->where(['user_id' => Yii::$app->user->identity->id])->all(),
            'alert_msg' => $alert_msg
        ]);
    }
    public function actionRemoveMyService()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $data = Yii::$app->request->post();

        $user_service_id = $data['user_service_id'];

        $model = UserService::findOne($user_service_id);

        if($model->img1){
            if(file_exists(Yii::getAlias('@frontend/web').$model->img1)) {
                unlink(Yii::getAlias('@frontend/web').$model->img1);
            }
        }
        if($model->img2){
            if(file_exists(Yii::getAlias('@frontend/web').$model->img2)) {
                unlink(Yii::getAlias('@frontend/web').$model->img2);
            }
        }
        if($model->img3){
            if(file_exists(Yii::getAlias('@frontend/web').$model->img3)) {
                unlink(Yii::getAlias('@frontend/web').$model->img3);
            }
        }
        if($model->img4){
            if(file_exists(Yii::getAlias('@frontend/web').$model->img4)) {
                unlink(Yii::getAlias('@frontend/web').$model->img4);
            }
        }
        if($model->img5){
            if(file_exists(Yii::getAlias('@frontend/web').$model->img5)) {
                unlink(Yii::getAlias('@frontend/web').$model->img5);
            }
        }
        if($model->img6){
            if(file_exists(Yii::getAlias('@frontend/web').$model->img6)) {
                unlink(Yii::getAlias('@frontend/web').$model->img6);
            }
        }

        if($model->delete()) {
            StateService::deleteAll(['service_id' => $model->service_id, 'user_id' => $model->user_id, 'user_service_id' => $model->id]);
            return ['status' => true];
        }
        else
            return ['status' => false];

    }


    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCurlecResponse()
    {
        return $this->render('curlecResponse',['data' => Yii::$app->request->get()]);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }




    /////////////////////////update by Aishah /////////////////////////////
    public function actionMyEvent()
    {
        $request = Yii::$app->request;

        return $this->render('myEvent',[
            'services' => Services::find()->all(),
            'model' => new UserService(),
            'user_service' => UserService::find()->where(['user_id' => Yii::$app->user->identity->id])->all(),
        ]);
    }
    
    public function actionRegisteredServices()
    {
        $request = Yii::$app->request;
        $alert_msg = "";
        if($request->isPost && $request->post('tab') == 'myservices') {

            $service_id = $request->post('myservice_id');
            $myservice_description = $request->post('myservice_description');

            $myimgtitle = strtolower($request->post('myservice_name'));
            $myimgtitle = str_replace(' ', '', $myimgtitle);

            $model_myservice = UserService::findOne($service_id);

            $myimg1 = UploadedFile::getInstanceByName('myservice_img1');
            if($myimg1) {
                if(file_exists($model_myservice->img1)){
                    unlink(Yii::getAlias('@frontend/web') . $model_myservice->img1);
                }
                $model_myimg1 = "/uploads/services/".Yii::$app->user->identity->id."_1_".$myimgtitle.".".$myimg1->extension;

                $myimg1->saveAs(Yii::getAlias('@frontend/web') . $model_myimg1);
                if(file_exists(Yii::getAlias('@frontend/web') . $model_myimg1)){
                    $model_myservice->img1 = $model_myimg1;  
                }else{
                    $alert_msg .= "Failed to uplaod Image 1. ";
                }
                
            }

            $myimg2 = UploadedFile::getInstanceByName('myservice_img2');
            if($myimg2) {
                if(file_exists($model_myservice->img2)){
                    unlink(Yii::getAlias('@frontend/web') . $model_myservice->img2);
                }
                $model_myimg2 = "/uploads/services/".Yii::$app->user->identity->id."_2_".$myimgtitle.".".$myimg2->extension;  

                $myimg2->saveAs(Yii::getAlias('@frontend/web') . $model_myimg2);
                if(file_exists(Yii::getAlias('@frontend/web') . $model_myimg2)){
                    $model_myservice->img2 = $model_myimg2;   
                }else{
                    $alert_msg .= "Failed to uplaod Image 2. ";
                }
            }

            $myimg3 = UploadedFile::getInstanceByName('myservice_img3');
            if($myimg3) {
                if(file_exists($model_myservice->img3)){
                    unlink(Yii::getAlias('@frontend/web') . $model_myservice->img3);
                }
                $model_myimg3 = "/uploads/services/".Yii::$app->user->identity->id."_3_".$myimgtitle.".".$myimg3->extension;

                $myimg3->saveAs(Yii::getAlias('@frontend/web') . $model_myimg3);
                if(file_exists(Yii::getAlias('@frontend/web') . $model_myimg3)){
                    $model_myservice->img3 = $model_myimg3;   
                }else{
                    $alert_msg .= "Failed to uplaod Image 3. ";
                }
            }

            $myimg4 = UploadedFile::getInstanceByName('myservice_img4');
            if($myimg4) {
                if(file_exists($model_myservice->img4)){
                    unlink(Yii::getAlias('@frontend/web') . $model_myservice->img4);
                }
                $model_myimg4 = "/uploads/services/".Yii::$app->user->identity->id."_4_".$myimgtitle.".".$myimg4->extension;         

                $myimg4->saveAs(Yii::getAlias('@frontend/web') . $model_myimg4);
                if(file_exists(Yii::getAlias('@frontend/web') . $model_myimg4)){
                    $model_myservice->img4 = $model_myimg4;   
                }else{
                    $alert_msg .= "Failed to uplaod Image 4. ";
                }
            }

            $myimg5 = UploadedFile::getInstanceByName('myservice_img5');
            if($myimg5) {
                if(file_exists($model_myservice->img5)){
                    unlink(Yii::getAlias('@frontend/web') . $model_myservice->img5);
                }
                $model_myimg5 = "/uploads/services/".Yii::$app->user->identity->id."_5_".$myimgtitle.".".$myimg5->extension;

                $myimg5->saveAs(Yii::getAlias('@frontend/web') . $model_myimg5);
                if(file_exists(Yii::getAlias('@frontend/web') . $model_myimg5)){
                    $model_myservice->img5 = $model_myimg5;   
                }else{
                    $alert_msg .= "Failed to uplaod Image 5. ";
                }
            }

            $myimg6 = UploadedFile::getInstanceByName('myservice_img6');
            if($myimg6) {
                if(file_exists($model_myservice->img6)){
                    unlink(Yii::getAlias('@frontend/web') . $model_myservice->img6);
                }
                $model_myimg6 = "/uploads/services/".Yii::$app->user->identity->id."_6_".$myimgtitle.".".$myimg6->extension;

                $myimg6->saveAs(Yii::getAlias('@frontend/web') . $model_myimg6);
                if(file_exists(Yii::getAlias('@frontend/web') . $model_myimg6)){
                    $model_myservice->img6 = $model_myimg6;  
                }else{
                    $alert_msg .= "Failed to uplaod Image 6. ";
                }
                
            }

            $model_myservice->description = $myservice_description;
//            $model_myservice->save();

            if($model_myservice->save())
            {
                StateService::deleteAll(['service_id' => $model_myservice->service_id, 'user_id' => $model_myservice->user_id, 'user_service_id' => $model_myservice->id]);

                $mystates = $request->post('mystate');

                if($mystates):
                    for($k=0;$k<sizeof($mystates);$k++):
                        $state_servis = new StateService();
                        $state_servis->state_id = (int)$mystates[$k];
                        $state_servis->service_id = $model_myservice->service_id;
                        $state_servis->user_id = $model_myservice->user_id;
                        $state_servis->user_service_id = $model_myservice->id;
                        $state_servis->save();
                    endfor;
                endif;
            }
            $alert_msg .= "Updated successful.";
        }
        return $this->render('registeredServices',[
            'services' => Services::find()->all(),
            'model' => new UserService(),
            'state' => State::find()->all(),
            'user_service' => UserService::find()->where(['user_id' => Yii::$app->user->identity->id])->all(),
            'alert_msg' => $alert_msg
        ]);
    }
    public function actionChangePassword()
    {
        $request = Yii::$app->request;
        $msg     = null;
        //send by ajax
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $data = $request->post();

            $hash = User::find()->where('id='.$data['id_user'])->One();
            //$validatePassword = User::validatePassword($data['pwd']);
            if (Yii::$app->getSecurity()->validatePassword($data['pwd'], $hash->password_hash)) {
                // all good, logging user in
                return [
                    'message' => 'success',
                    'text'    => '',
                ];
            } else {
                // wrong password
                return [
                    'message'=> 'failed',
                    'text'   => 'Wrong Password!',
                ];
            }

        }

        //post to save value
        if($request->isPost){
            $model = User::find()->where('id='.$request->post('profile_id'))->One();
            $model->setPassword($request->post('password'));
            $model->save();

            $msg =  '<strong>Success!</strong> Password changed.';
        }        
        
        return $this->render('changePassword', [ 'data_message' => $msg, ]);
    }

    public function actionBuddyPartners()
    {
        $request = Yii::$app->request;
        $id =  Yii::$app->user->identity->id;
        $ref_master_buddy = mb_substr(Yii::$app->user->identity->reference_code, 3);

        if(Yii::$app->user->identity->user_status == 11){
            $user = User::find()->where(['!=', 'id', $id])->all();
        }else{
            $user = User::find()->where(['reference_code' => 'SMB:'.$ref_master_buddy])->all();
        }
        return $this->render('buddyPartners',[
            'ref_code'=> $ref_master_buddy,
            'user' => $user,
        ]);
    }

    public function actionShareLink()
    {
        $request = Yii::$app->request;

        return $this->render('shareLink',[
            'services' => Services::find()->all(),
            'model' => new UserService(),
            'user_service' => UserService::find()->where(['user_id' => Yii::$app->user->identity->id])->all(),
        ]);
    }
}
