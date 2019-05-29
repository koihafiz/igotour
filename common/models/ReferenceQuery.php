<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Reference]].
 *
 * @see Reference
 */
class ReferenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Reference[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Reference|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
