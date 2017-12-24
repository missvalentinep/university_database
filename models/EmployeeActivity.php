<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_activity".
 *
 * @property int $entry_id
 * @property int $activity_id
 * @property string $employee_id
 *
 * @property Activity $activity
 * @property Employee $employee
 */
class EmployeeActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'employee_id'], 'required'],
            [['activity_id'], 'integer'],
            [['employee_id'], 'string', 'max' => 5],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::className(), 'targetAttribute' => ['activity_id' => 'activity_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entry_id' => 'Entry ID',
            'activity_id' => 'Activity ID',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['activity_id' => 'activity_id']);
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
     * @return EmployeeActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeActivityQuery(get_called_class());
    }
}
