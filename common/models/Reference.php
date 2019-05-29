<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "reference".
 *
 * @property int $id
 * @property string $reference
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 */
class Reference extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reference';
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
            [['reference'], 'required'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['reference'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reference' => Yii::t('app', 'Reference'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function findByCode($code)
    {
        if($code != NULL){
            //exits
            $data = static::findOne(['reference' => $code]);
            if(!isset($data)){
                $status = ['status'=> "Fail"];
            }else if($data->user_id == NULL){
                $status = ['status'=>"MasterBuddy" , 'refCode'=> 'MB:'.$code, 'user_status'=> '1'];
            }else{
                $status = ['status'=>"SubBuddy", 'refCode'=> 'SMB:'.$code, 'user_status'=> '2'];
            }
        }else{
            $status = ['status'=>"NoBuddy", 'refCode'=> 'NRC001', 'user_status'=> '0'];
        }

        return $status;
    }

    public static function findIdentityCode($code)
    {
        return static::findOne(['reference' => $code]);
    }

    /**
     * {@inheritdoc}
     * @return ReferenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReferenceQuery(get_called_class());
    }
}
