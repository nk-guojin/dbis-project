<?php


/**
 * Team: "小组"小组
 * Coding by 2011431, 2013544
 * This is the comment of frontend news
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php foreach($comments as $comment): ?>

<div class="newscomment">

	<div class="row">
		<div class="col-md-12">
			<div class="comment_detail">
			<p class="bg-info">
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
			 <em><?= Html::encode($comment->user->username);?>;</em>
			 <br>
			 <?= nl2br($comment->content);?>
			 <br>
			 <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
			 <em><?= date('Y-m-d H:i:s',$comment->create_time);?>;</em>
			 </p>			 
		</div>
	</div>
</div>
</div>

<?php endforeach;?>