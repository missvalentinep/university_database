<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_courses".
 *
 * @property int $year
 * @property int $semester
 * @property int $credit_points
 * @property int $entry_id
 * @property int $course_id
 * @property string $employee_id
 *
 * @property Course $course
 * @property Employee $employee
 */
class EmployeeCourses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'semester', 'credit_points', 'course_id', 'employee_id'], 'required'],
            [['year', 'semester', 'credit_points', 'course_id'], 'integer'],
            [['employee_id'], 'string', 'max' => 5],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'course_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'year' => 'Year',
            'semester' => 'Semester',
            'credit_points' => 'Credit Points',
            'entry_id' => 'Entry ID',
            'course_id' => 'Course ID',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @inheritdoc
     * @return EmployeeCoursesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeCoursesQuery(get_called_class());
    }
}
