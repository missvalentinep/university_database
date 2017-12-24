<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EmployeeCourses]].
 *
 * @see EmployeeCourses
 */
class EmployeeCoursesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EmployeeCourses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EmployeeCourses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
