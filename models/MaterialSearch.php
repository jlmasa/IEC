<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materials;

/**
 * app\models\MaterialSearch represents the model behind the search form about `app\models\Materials`.
 */
 class MaterialSearch extends Materials
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'integer'],
            [['category', 'title', 'logo', 'id', 'volume'], 'safe'],
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
        $query = Materials::find();
		
		
		//tbl_tags.category_id
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$query->joinWith(['tags']);

        $query->andFilterWhere([
       
            'year' => $this->year,
        	'volume' => $this->volume,
        	'tags' => $this->tags,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'title', $this->title])
        	->andFilterWhere(['like', 'volume', $this->volume])
            ->andFilterWhere(['like', 'logo', $this->logo])
			->andFilterWhere(['like', 'tbl_tags.tags', $this->id]);
    		//->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
