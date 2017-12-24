<?php

namespace app\models;

use DateTime;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "employee".
 *
 * @property string $employee_id
 * @property string $full_name
 * @property string $occupation
 * @property string $date_of_birth
 * @property string $graduation_information
 * @property string $science_degree
 * @property string $academic_title
 * @property string $start_of_work
 * @property int $length_of_employment
 * @property string $last_advanced_training
 * @property int $department_id
 *
 * @property Department $department
 * @property EmployeeActivity[] $employeeActivities
 * @property EmployeeCourses[] $employeeCourses
 * @property EmployeePublishedWork[] $employeePublishedWorks
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'full_name', 'occupation', 'date_of_birth', 'start_of_work', 'department_id'], 'required'],
            [['date_of_birth', 'start_of_work'], 'safe'],
            [['length_of_employment', 'department_id'], 'integer'],
            [['employee_id'], 'string', 'max' => 5],
            [['full_name', 'science_degree', 'academic_title'], 'string', 'max' => 100],
            [['occupation', 'graduation_information', 'last_advanced_training'], 'string', 'max' => 255],
            [['employee_id'], 'unique'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Логин',
            'full_name' => 'ФИО',
            'occupation' => 'Должность',
            'date_of_birth' => 'Дата рождения',
            'graduation_information' => 'Информация о выпуске',
            'science_degree' => 'Ученая степень',
            'academic_title' => 'Ученое звание',
            'start_of_work' => 'Дата начала работы',
            'length_of_employment' => 'Стаж',
            'last_advanced_training' => 'Данные о последнем повышении квалификации',
            'department_id' => 'Кафедра',
            'department' => 'Кафедра',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeActivities()
    {
        return $this->hasMany(EmployeeActivity::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeCourses()
    {
        return $this->hasMany(EmployeeCourses::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeePublishedWorks()
    {
        return $this->hasMany(EmployeePublishedWork::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @inheritdoc
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }

    /**
     * Return array of department names
     *
     * @return array
     */
    public function getDepartments()
    {
        $departments = ArrayHelper::map(Department::find()->asArray()->all(),'department_id','department_name');
        return $departments;

    }

    public function beforeSave($insert)
    {
        $currentDate= new DateTime( date( 'Y-m-d' ) );
        $workDate = new DateTime($this->start_of_work);
        $diff = $workDate->diff($currentDate);

        $this->length_of_employment = $diff->y;
        return parent::beforeSave($insert);

    }
}
