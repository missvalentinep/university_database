<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ActivityType]].
 *
 * @see ActivityType
 */
class ActivityTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ActivityType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ActivityType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
