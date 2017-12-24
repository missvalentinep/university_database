<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $course_id
 * @property int $course_title
 *
 * @property EmployeeCourses[] $employeeCourses
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_title'], 'required'],
            [['course_title'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'course_title' => 'Course Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeCourses()
    {
        return $this->hasMany(EmployeeCourses::className(), ['course_id' => 'course_id']);
    }

    /**
     * @inheritdoc
     * @return CourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseQuery(get_called_class());
    }
}
