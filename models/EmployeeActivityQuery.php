<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EmployeeActivity]].
 *
 * @see EmployeeActivity
 */
class EmployeeActivityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EmployeeActivity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EmployeeActivity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
