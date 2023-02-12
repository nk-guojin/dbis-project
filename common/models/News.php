<?php


/**
 * Team: "小组"小组
 * Coding by 2011431
 * This is the news of common model
 */

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string|null $tags
 * @property int $status
 * @property int|null $create_time
 * @property int|null $update_time
 * @property int $author_id
 *
 * @property Adminuser $author
 * @property Newsstatus $status0
 * @property Newscomment[] $newscomments
 */
class News extends \yii\db\ActiveRecord
{
    private $_oldTags;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'status', 'author_id'], 'required'],
            [['content', 'tags'], 'string'],
            [['status', 'create_time', 'update_time', 'author_id'], 'integer'],
            [['title'], 'string', 'max' => 128],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Adminuser::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Newsstatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '新闻ID',
            'title' => '标题',
            'content' => '内容',
            'tags' => '标签',
            'status' => '状态',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'author_id' => '作者',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Newsstatus::className(), ['id' => 'status']);
    }

    /**
     * Gets query for [[Newscomments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewscomments()
    {
        return $this->hasMany(Newscomment::className(), ['post_id' => 'id']);
    }

    public function getActiveComments()
    {
    	return $this->hasMany(Newscomment::className(), ['post_id' => 'id'])
    	->where('status=:status',[':status'=>2])->orderBy('id DESC');
    }
    
    public function beforeSave($insert)
    {
    	if(parent::beforeSave($insert))
    	{
    		if($insert)
    		{
    			$this->create_time = time();
    			$this->update_time = time();
    		}
    		else 
    		{
    			$this->update_time = time();
    		}
    		
    		return true;
    			
    	}
    	else 
    	{
    		return false;
    	}
    } 
    
    public function afterFind()
    {
    	parent::afterFind();
    	$this->_oldTags = $this->tags;
    }
    
    public function afterSave($insert, $changedAttributes)
    {
    	parent::afterSave($insert, $changedAttributes);
    	Tag::updateFrequency($this->_oldTags, $this->tags);
    }
    
    public function afterDelete()
    {
    	parent::afterDelete();
    	Tag::updateFrequency($this->tags, '');
    }
    
    public function getUrl()
    {
    	return Yii::$app->urlManager->createUrl(
    			['news/detail','id'=>$this->id,'title'=>$this->title]);
    }
    
    public function getBeginning($length=288)
    {
    	$tmpStr = strip_tags($this->content);
    	$tmpLen = mb_strlen($tmpStr);
    	 
    	$tmpStr = mb_substr($tmpStr,0,$length,'utf-8');
    	return $tmpStr.($tmpLen>$length?'...':'');
    }
    
    public function  getTagLinks()
    {
    	$links=array();
    	foreach(Tag::string2array($this->tags) as $tag)
    	{
    		$links[]=Html::a(Html::encode($tag),array('news/index','NewsSearch[tags]'=>$tag));
    	}
    	return $links;
    }

    public function getCommentCount()
    {
    	return Newscomment::find()->where(['post_id'=>$this->id,'status'=>2])->count();
    }

    public function getNewsCommentCount()
    {
    	return Newscomment::find()->where(['post_id'=>$this->id,'status'=>2])->count();
    }

    public static function primaryKey()
    {
        return ['id'];
    }
}
