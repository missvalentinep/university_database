<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity_type".
 *
 * @property string $type
 * @property int $points
 * @property int $type_id
 *
 * @property Activity[] $activities
 */
class ActivityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'points'], 'required'],
            [['points'], 'integer'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type' => 'Type',
            'points' => 'Points',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['type_id' => 'type_id']);
    }

    /**
     * @inheritdoc
     * @return ActivityTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityTypeQuery(get_called_class());
    }
    public function __toString()
    {
        return $this->type;
    }
}
