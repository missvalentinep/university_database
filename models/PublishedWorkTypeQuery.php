<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PublishedWorkType]].
 *
 * @see PublishedWorkType
 */
class PublishedWorkTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PublishedWorkType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PublishedWorkType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
