<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $avatar
 * @property string $website
 * @property string $address
 * @property int $postcode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $created_at
 * @property int $updated_at
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
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
            [['user_id'], 'required'],
            [['user_id', 'postcode', 'created_at', 'updated_at'], 'integer'],
            [['address'], 'string'],
            [['avatar', 'website', 'city', 'state', 'country'], 'string', 'max' => 123],
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
            'avatar' => Yii::t('app', 'Avatar'),
            'website' => Yii::t('app', 'Website'),
            'address' => Yii::t('app', 'Address'),
            'postcode' => Yii::t('app', 'Postcode'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'gender' => Yii::t('app', 'Gender'),
            'id_no' => Yii::t('app', 'Identity No./ Passport No.'),
            'language' => Yii::t('app', 'Language'),
            'dob' => Yii::t('app', 'Date Of Birth'),
            'status' => Yii::t('app', 'Profile Status'),
            'about_me' => Yii::t('app', 'About Me'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserService()
    {
        return $this->hasMany(UserService::className(),['user_id' => 'user_id']);
    }  

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
