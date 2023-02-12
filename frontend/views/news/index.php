<?php


/**
 * Team: "小组"小组
 * Coding by 2011431
 * This is the index of frontend news
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\NewsTagsCloudWidget;
use frontend\components\RctNewsReplyWidget;
use common\models\News;
use yii\caching\DbDependency;
use yii\caching\yii\caching;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="container">

	<div class="row">
	
		<div class="col-md-9">
		
		<ol class="breadcrumb">
		<li><a href="<?= Yii::$app->homeUrl;?>">首页</a></li>
		<li>新闻列表</li>
		
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
				  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 查找新闻（
				  <?= News::find()->count();?>
				  ）
				  </li>
				  <li class="list-group-item">				  <!--?class="form-inline" php Yii::$app->urlManager->createUrl(['index']);?-->
					  <form action="index.php?r=news/index" id="w1" method="get">
						  <div class="form-group">
						  <input type="hidden" name="r" value="news/index">
						    <input type="text" class="form-control" name="NewsSearch[title]" id="w1input" placeholder="按标题">
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
				  <?php 
				  ?>
				  <?= NewsTagsCloudWidget::widget(['tags'=>$tags]);?>
				  </li>
				</ul>			
			</div>
			<div class="commentbox">
				<ul class="list-group">
				  <li class="list-group-item">
				  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 最新回复
				  </li>
				  <li class="list-group-item">
				  <?= RctNewsReplyWidget::widget(['recentNewsComments'=>$recentNewsComments])?>
				  </li>
				</ul>			
			</div>
		</div>
	</div>
</div>

