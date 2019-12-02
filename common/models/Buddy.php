<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "buddy".
 *
 * @property int $id
 * @property int $buddy_id
 * @property int $traveller_id
 * @property int $cart_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Buddy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buddy';
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
            [['buddy_id', 'cart_id'], 'required'],
            [['buddy_id', 'traveller_id', 'cart_id', 'status', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'buddy_id' => Yii::t('app', 'Buddy ID'),
            'traveller_id' => Yii::t('app', 'Traveller ID'),
            'cart_id' => Yii::t('app', 'Cart ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['id' => 'cart_id']);
    }

    public function getBuddy()
    {
        return $this->hasOne(User::className(), ['id' => 'buddy_id']);
    }

    /**
     * {@inheritdoc}
     * @return BuddyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BuddyQuery(get_called_class());
    }
}
