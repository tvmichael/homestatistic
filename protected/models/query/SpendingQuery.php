<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[Spending]].
 *
 * @see Spending
 */
class SpendingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Spending[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Spending|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
