<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 * @property string $service_title
 * @property int $total_hour
 * @property int $date
 * @property int $time_from
 * @property int $time_to
 * @property double $charge
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
            [['user_id', 'service_id', 'total_hour', 'date', 'time_from', 'time_to', 'charge'], 'required'],
            [['user_id', 'service_id', 'total_hour', 'date', 'time_from', 'time_to', 'created_at', 'updated_at'], 'integer'],
            [['charge'], 'number'],
            [['service_title'], 'string', 'max' => 321],
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
            'service_title' => Yii::t('app', 'Service Title'),
            'total_hour' => Yii::t('app', 'Total Hour'),
            'date' => Yii::t('app', 'Date'),
            'time_from' => Yii::t('app', 'Time From'),
            'time_to' => Yii::t('app', 'Time To'),
            'charge' => Yii::t('app', 'Charge'),
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
