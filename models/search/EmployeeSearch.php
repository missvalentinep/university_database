<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `app\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'full_name', 'occupation', 'date_of_birth', 'graduation_information', 'science_degree', 'academic_title', 'start_of_work', 'last_advanced_training'], 'safe'],
            [['length_of_employment', 'department_id'], 'integer'],
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
        $query = Employee::find();

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
            'date_of_birth' => $this->date_of_birth,
            'start_of_work' => $this->start_of_work,
            'length_of_employment' => $this->length_of_employment,
            'department_id' => $this->department_id,
        ]);

        $query->andFilterWhere(['like', 'employee_id', $this->employee_id])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'graduation_information', $this->graduation_information])
            ->andFilterWhere(['like', 'science_degree', $this->science_degree])
            ->andFilterWhere(['like', 'academic_title', $this->academic_title])
            ->andFilterWhere(['like', 'last_advanced_training', $this->last_advanced_training]);

        return $dataProvider;
    }
}
