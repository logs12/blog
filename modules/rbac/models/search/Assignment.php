<?php

namespace app\modules\rbac\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use yii\base\Model;

/**
 * SearchAssignment represents the model behind the search form about `app\modules\rbac\models\Assignment`.
 */
class Assignment extends Model
{
    public $id;
    public $username;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('rbac', 'ID'),
            'username' => Yii::t('rbac', 'Username'),
            'name' => Yii::t('rbac', 'Name'),
        ];
    }

    /**
     * Create data provider for Assignment model.
     * @param  array                        $params
     * @param  \yii\db\ActiveRecord         $class
     * @param  string                       $usernameField
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params, $class, $usernameField)
    {
        $query = $class::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!($this->load($params) && $this->validate())) {

            return $dataProvider;
        }


        $query->andFilterWhere(['like', $usernameField, $this->username]);

        return $dataProvider;
    }
}
