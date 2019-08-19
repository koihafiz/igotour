<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Buddy]].
 *
 * @see Buddy
 */
class BuddyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Buddy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Buddy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
