<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "activity".
 *
 * @property string $start_date
 * @property string $end_date
 * @property string $supporting_documents
 * @property int $activity_id
 * @property int $type_id
 * @property string $comment
 *
 * @property ActivityType $type
 * @property EmployeeActivity[] $employeeActivities
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'supporting_documents', 'type_id', 'comment'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['type_id'], 'integer'],
            [['supporting_documents', 'comment'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ActivityType::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'start_date' => 'Дата начала',
            'end_date' => 'Дата конца',
            'supporting_documents' => 'Ссылка на подтверждающие документы',
            'activity_id' => 'Activity ID',
            'type_id' => 'Тип',
            'type' => 'Тип',
            'comment' => 'Информация',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ActivityType::className(), ['type_id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeActivities()
    {
        return $this->hasMany(EmployeeActivity::className(), ['activity_id' => 'activity_id']);
    }

    /**
     * @inheritdoc
     * @return ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityQuery(get_called_class());
    }

    public function getTypes()
    {
        $types = ArrayHelper::map(ActivityType::find()->orderBy('type asc')->asArray()->all(), 'type_id', 'type');
        return $types;

    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //... тут ваш код
        $result = EmployeeActivity::find()
            ->where(['employee_id' => Yii::$app->user->identity->username, 'activity_id' => $this->activity_id])
            ->count();


        //Yii::$app->user->identity->username;
        if ($result==0) {
            $employeeActivity = new EmployeeActivity();
            $employeeActivity->employee_id = Yii::$app->user->identity->username;
            $employeeActivity->activity_id = $this->activity_id;
            $employeeActivity->save();
        }


    }




}
