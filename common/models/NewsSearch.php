<?php


/**
 * Team: "小组"小组
 * Coding by 2013922
 * This is the newssearch of common model
 */

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form of `common\models\News`.
 */
class NewsSearch extends News
{
    public function attributes()
	{
		return array_merge(parent::attributes(),['authorName']);
	}
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'create_time', 'update_time', 'author_id'], 'integer'],
            [['title', 'content', 'tags'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = News::find();

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => ['pageSize'=>10],
        	'sort'=>[
        			'defaultOrder'=>[
        					'id'=>SORT_DESC,        			
        			],
        	],
        ]);

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
        /*$query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tags', $this->tags]);*/

        // grid filtering conditions
        $query->andFilterWhere([
            //'id' => $this->id,
        	'news.id' => $this->id,
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        $query->join('INNER JOIN','Adminuser','news.author_id = Adminuser.id');
        $query->andFilterWhere(['like','Adminuser.nickname',$this->authorName]);
        
        $dataProvider->sort->attributes['authorName'] = 
        [
        	'asc'=>['Adminuser.nickname'=>SORT_ASC],
        	'desc'=>['Adminuser.nickname'=>SORT_DESC],
        ];

        return $dataProvider;
    }
}
