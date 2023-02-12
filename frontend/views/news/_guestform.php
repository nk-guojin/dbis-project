<?php


/**
 * Team: "小组"小组
 * Coding by 2011431
 * This is the guestform of frontend news
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Newscomment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin([
    		'action'=>['news/detail','id'=>$id,'#'=>'newscomments'],
    		'method'=>'post',
    		]); ?>

    
    <div class="row">
    	<div class="col-md-12"><?= $form->field($commentModel,'content')->textarea(['row'=>6])?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('发表评论', ['class' =>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>