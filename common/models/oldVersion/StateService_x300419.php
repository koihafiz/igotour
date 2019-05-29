<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "state_service".
 *
 * @property int $id
 * @property int $state_id
 * @property int $service_id
 * @property int $user_id
 * @property int $user_service_id
 * @property int $created_at
 * @property int $updated_at
 */
class StateService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state_service';
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
            [['state_id', 'service_id', 'user_id', 'user_service_id'], 'required'],
            [['state_id', 'service_id', 'user_id', 'user_service_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'service_id' => Yii::t('app', 'Service ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_service_id' => Yii::t('app', 'User Service ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return StateServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StateServiceQuery(get_called_class());
    }
}
