<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publications_at_IB".
 *
 * @property int $indexation_base
 * @property int $points
 * @property int $entry_id
 * @property int $publication_id
 *
 * @property PublishedWork $publication
 */
class PublicationsAtIB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publications_at_IB';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['indexation_base', 'points', 'publication_id'], 'required'],
            [['indexation_base', 'points', 'publication_id'], 'integer'],
            [['publication_id'], 'exist', 'skipOnError' => true, 'targetClass' => PublishedWork::className(), 'targetAttribute' => ['publication_id' => 'publication_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'indexation_base' => 'Indexation Base',
            'points' => 'Points',
            'entry_id' => 'Entry ID',
            'publication_id' => 'Publication ID',
        ];
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
     * @return PublicationsAtIBQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PublicationsAtIBQuery(get_called_class());
    }
}
