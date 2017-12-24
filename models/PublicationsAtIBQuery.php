<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PublicationsAtIB]].
 *
 * @see PublicationsAtIB
 */
class PublicationsAtIBQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PublicationsAtIB[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PublicationsAtIB|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
