<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PublishedWork;

/**
 * PublishedWorkSearch represents the model behind the search form of `app\models\PublishedWork`.
 */
class PublishedWorkSearch extends PublishedWork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publication_id', 'number_of_pages', 'number_of_authors', 'type_id'], 'integer'],
            [['title', 'date_published', 'supporting_documents', 'comment'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PublishedWork::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'publication_id' => $this->publication_id,
            'number_of_pages' => $this->number_of_pages,
            'number_of_authors' => $this->number_of_authors,
            'date_published' => $this->date_published,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'supporting_documents', $this->supporting_documents])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
