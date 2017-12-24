<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "published_work_type".
 *
 * @property string $type
 * @property int $points
 * @property int $type_id
 *
 * @property PublishedWork[] $publishedWorks
 */
class PublishedWorkType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'published_work_type';
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
    public function getPublishedWorks()
    {
        return $this->hasMany(PublishedWork::className(), ['type_id' => 'type_id']);
    }

    /**
     * @inheritdoc
     * @return PublishedWorkTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PublishedWorkTypeQuery(get_called_class());
    }
}
