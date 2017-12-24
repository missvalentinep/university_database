<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PublishedWork]].
 *
 * @see PublishedWork
 */
class PublishedWorkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PublishedWork[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PublishedWork|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
