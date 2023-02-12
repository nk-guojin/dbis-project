<?php


/**
 * Team: "小组"小组
 * Coding by 2011431
 * This is the index of frontend post
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;
use common\models\Post;
use yii\caching\DbDependency;
use yii\caching\yii\caching;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="container">

	<div class="row">
	
		<div class="col-md-9">
		
		<ol class="breadcrumb">
		<li><a href="<?= Yii::$app->homeUrl;?>">首页</a></li>
		<li>文章列表</li>
		
		</ol>
		
		<?= ListView::widget([
				'id'=>'postList',
				'dataProvider'=>$dataProvider,
				'itemView'=>'_listitem',//子视图,显示一篇文章的标题等内容.
				'layout'=>'{items} {pager}',
				'pager'=>[
						'maxButtonCount'=>10,
						'nextPageLabel'=>Yii::t('app','下一页'),
						'prevPageLabel'=>Yii::t('app','上一页'),
		],
		])?>
		
		</div>

		
		<div class="col-md-3">
			<div class="searchbox">
				<ul class="list-group">
				  <li class="list-group-item">
				  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 查找文章（
				  <?= Post::find()->count();?>
				  ）
				  </li>
				  <li class="list-group-item">			<!--? php Yii::$app->urlManager->createUrl(['post/index']);?-->	  
					  <form class="form-inline" action="index.php?r=post/index" id="w0" method="get">
						  <div class="form-group">
						  <input type="hidden" name="r" value="post/index">
						    <input type="text" class="form-control" name="PostSearch[title]" id="w0input" placeholder="按标题">
						   </div>
						   <button type="submit" class="btn btn-default">搜索</button>
					</form>
				  
				  </li>
				</ul>			
			</div>
			
			<div class="tagcloudbox">
				<ul class="list-group">
				  <li class="list-group-item">
				  <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 标签云
				  </li>
				  <li class="list-group-item">
				  <?= TagsCloudWidget::widget(['tags'=>$tags]);?>
				  </li>
				</ul>			
			</div>
			
			
			<div class="commentbox">
				<ul class="list-group">
				  <li class="list-group-item">
				  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 最新回复
				  </li>
				  <li class="list-group-item">
				  <?= RctReplyWidget::widget(['recentComments'=>$recentComments])?>
				  </li>
				</ul>			
			</div>
		</div>
	</div>
</div>
