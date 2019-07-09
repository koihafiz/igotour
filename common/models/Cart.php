<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $user_id
 * @property int $buddy_id
 * @property int $service_id
 * @property string $service_title
 * @property int $country_id
 * @property int $state_id
 * @property double $duration
 * @property double $charge
 * @property int $date
 * @property int $start_time
 * @property int $end_time
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'service_id', 'country_id', 'state_id', 'duration', 'charge', 'date', 'start_time', 'end_time'], 'required'],
            [['user_id', 'buddy_id', 'service_id', 'country_id', 'state_id', 'date', 'start_time', 'end_time', 'status', 'created_at', 'updated_at'], 'integer'],
            [['duration', 'charge'], 'number'],
            [['service_title'], 'string', 'max' => 123],
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
            'buddy_id' => Yii::t('app', 'Buddy ID'),
            'service_id' => Yii::t('app', 'Service ID'),
            'service_title' => Yii::t('app', 'Service Title'),
            'country_id' => Yii::t('app', 'Country ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'duration' => Yii::t('app', 'Duration'),
            'charge' => Yii::t('app', 'Charge'),
            'date' => Yii::t('app', 'Date'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CartQuery(get_called_class());
    }
}
