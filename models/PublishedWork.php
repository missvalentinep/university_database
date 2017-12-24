<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "published_work".
 *
 * @property int $publication_id
 * @property string $title
 * @property int $number_of_pages
 * @property int $number_of_authors
 * @property string $date_published
 * @property string $supporting_documents
 * @property string $comment
 * @property int $type_id
 *
 * @property EmployeePublishedWork[] $employeePublishedWorks
 * @property PublicationsAtIB[] $publicationsAtIBs
 * @property PublishedWorkType $type
 */
class PublishedWork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'published_work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'number_of_pages', 'number_of_authors', 'date_published', 'supporting_documents', 'comment', 'type_id'], 'required'],
            [['number_of_pages', 'number_of_authors', 'type_id'], 'integer'],
            [['date_published'], 'safe'],
            [['title', 'supporting_documents', 'comment'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PublishedWorkType::className(), 'targetAttribute' => ['type_id' => 'type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'publication_id' => 'ID публикации',
            'title' => 'Название',
            'number_of_pages' => 'Количество страниц',
            'number_of_authors' => 'Количество авторов',
            'date_published' => 'Дата публикации',
            'supporting_documents' => 'Ссылка на подтверждающие документы',
            'comment' => 'Комментарий',
            'type_id' => 'Тип',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeePublishedWorks()
    {
        return $this->hasMany(EmployeePublishedWork::className(), ['publication_id' => 'publication_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicationsAtIBs()
    {
        return $this->hasMany(PublicationsAtIB::className(), ['publication_id' => 'publication_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PublishedWorkType::className(), ['type_id' => 'type_id']);
    }

    /**
     * @inheritdoc
     * @return PublishedWorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PublishedWorkQuery(get_called_class());
    }
    public function getTypes()
    {
        $types = ArrayHelper::map(PublishedWorkType::find()->asArray()->all(),'type_id','type');
        return $types;

    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //... тут ваш код
        $result = EmployeePublishedWork::find()
            ->where(['employee_id' => Yii::$app->user->identity->username, 'publication_id' => $this->publication_id])
            ->count();


        //Yii::$app->user->identity->username;
        if ($result==0) {
            $employeePublication = new EmployeePublishedWork();
            $employeePublication->employee_id = Yii::$app->user->identity->username;
            $employeePublication->publication_id = $this->publication_id;
            $employeePublication->save();
        }


    }



}

