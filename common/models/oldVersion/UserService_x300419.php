<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user_service".
 *
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 * @property string $img1
 * @property string $img2
 * @property string $img3
 * @property string $img4
 * @property string $img5
 * @property string $img6
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 */
class UserService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_service';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id'], 'required'],
            [['user_id', 'service_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['img1', 'img2', 'img3', 'img4', 'img5', 'img6'], 'string', 'max' => 123],
            [['user_id', 'service_id'], 'unique', 'targetAttribute' => ['user_id', 'service_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'service_id' => Yii::t('app', 'Service ID'),
            'img1' => Yii::t('app', 'Img1'),
            'img2' => Yii::t('app', 'Img2'),
            'img3' => Yii::t('app', 'Img3'),
            'img4' => Yii::t('app', 'Img4'),
            'img5' => Yii::t('app', 'Img5'),
            'img6' => Yii::t('app', 'Img6'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getService()
    {
        return Services::findOne($this->service_id);
    }

    public function getUser()
    {
        return User::findOne($this->user_id);
    }

    public function getProfile()
    {
        return Profile::findOne($this->user_id);
    }

    public static function getDetailsProfile(){
           //return Profile::find()->joinWith('userService')->where(['profile.status' => 10])->distinct()->all();
           return Profile::find()
                            ->joinWith('userService')
                            ->joinWith('user')
                            ->where(['profile.status' => 10, 'user.status'=> 10])
                            ->distinct()->all();
    }

    public static function findTourGuide()
    {
        return self::find()->select('user_id')->distinct()->all();
    }

    /**
     * {@inheritdoc}
     * @return UserServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserServiceQuery(get_called_class());
    }
}
