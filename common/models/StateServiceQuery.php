<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[StateService]].
 *
 * @see StateService
 */
class StateServiceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StateService[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StateService|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
