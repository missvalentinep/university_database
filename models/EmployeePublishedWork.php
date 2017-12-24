<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee_published_work".
 *
 * @property int $entry_id
 * @property string $employee_id
 * @property int $publication_id
 *
 * @property Employee $employee
 * @property PublishedWork $publication
 */
class EmployeePublishedWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_published_work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'publication_id'], 'required'],
            [['publication_id'], 'integer'],
            [['employee_id'], 'string', 'max' => 5],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'employee_id']],
            [['publication_id'], 'exist', 'skipOnError' => true, 'targetClass' => PublishedWork::className(), 'targetAttribute' => ['publication_id' => 'publication_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entry_id' => 'Entry ID',
            'employee_id' => 'Employee ID',
            'publication_id' => 'Publication ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublication()
    {
        return $this->hasOne(PublishedWork::className(), ['publication_id' => 'publication_id']);
    }

    /**
     * @inheritdoc
     * @return EmployeePublishedWorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeePublishedWorkQuery(get_called_class());
    }
}
