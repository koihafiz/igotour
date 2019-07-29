<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Reference;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $password;
    public $password_repeat;
    public $reference_code;
    public $user_status;
    public $role;
    public $ic_passport;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            //['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 10, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['phone', 'string', 'max' => 16],
            ['reference_code', 'validateReferenceCode'],

            ['user_status', 'integer'],
            ['ic_passport', 'string', 'max' => 15],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required','message'=>"Please Confirm Password"],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Your Password did not Match"],

            ['role', 'required','message'=>"Please choose your registration selection as Buddy or Traveller"],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if($this->role == 'tr'){
            $user->user_status = '22';
            $user->reference_code = "TRAVELER";
            $user->ic_passport = $this->ic_passport;
        }else{
            $model = Reference::findByCode($this->reference_code);

            $user->reference_code = $model['refCode'];//$this->reference_code ? $this->reference_code : 'NRC001' ;
            $user->user_status =  $model['user_status'];
            $user->save(false);
            //update UserID at Reference table
            if($model['status'] == 'MasterBuddy'){
                $model = Reference::findIdentityCode($this->reference_code);
                $model->user_id = $user->id;
                $model->save();
            }
        }


        $user->save(true);

        //send Email
        if($this->role == 'tr'){
            Yii::$app->mailer
                ->compose(
                    ['html' => 'signUpNewTraveller-html'],
                    ['username' => $user->username]
                )
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setTo($this->email)
                ->setSubject('New Traveller Registration ' . Yii::$app->name)
                ->send();
        }else {
            Yii::$app->mailer
                ->compose(
                    ['html' => 'signUpNewMembers-html', 'text' => 'signUpNewMembers-text'],
                    ['username' => $user->username]
                )
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setTo($this->email)
                ->setSubject('New Members Registration ' . Yii::$app->name)
                ->send();
        }

        return $user->save(true) ? $user : null;

    }

    public function validateReferenceCode($attribute, $params)
    {
        $model = Reference::findByCode($this->reference_code);
        if ($model['status'] == 'Fail') {
            $this->addError('reference_code', 'Wrong Code!'. $model['refCode']);
        }
    }
}
