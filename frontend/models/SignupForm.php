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
    public $role;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 10, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['phone', 'string', 'max' => 16],
            ['reference_code', 'validateReferenceCode'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required','message'=>"Please Confirm Password"],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Your Password did not Match"],
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
        
        $model = Reference::findByCode($this->reference_code);
        //print_r($model);die();
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->reference_code = $model['refCode'];//$this->reference_code ? $this->reference_code : 'NRC001' ;
        $user->user_status =  $model['user_status'];
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save(false);
        //update UserID at Reference table
        if($model['status'] == 'MasterBuddy'){
            $model = Reference::findIdentityCode($this->reference_code);
            $model->user_id = $user->id;
            $model->save();
        }

        $user->save(true);

        Yii::$app->mailer
                    ->compose(
                        ['html' => 'signUpNewMembers-html', 'text' => 'signUpNewMembers-text'],
                        ['username' => $user->username]
                    )
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject('New Members Registration ' . Yii::$app->name)
                    ->send();

        return $user->save(true) ? $user : null;
        //send email
        /*return  Yii::$app->mailer
                    ->compose(
                        ['html' => 'signUpNewMembers-html', 'text' => 'signUpNewMembers-text'],
                        ['username' => $user->username]
                    )
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject('New Members Registration ' . Yii::$app->name)
                    ->send();*/
    }

    public function validateReferenceCode($attribute, $params)
    {
        $model = Reference::findByCode($this->reference_code);
        if ($model['status'] == 'Fail') {
            $this->addError('reference_code', 'Wrong Code!');
        }
    }
}
