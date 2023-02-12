<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "newsstatus".
 *
 * @property int $id
 * @property string $name
 * @property int $position
 *
 * @property News[] $news
 */
class Newsstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['position'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['status' => 'id']);
    }
}
