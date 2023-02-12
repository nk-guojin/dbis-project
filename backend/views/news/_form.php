<?php


/**
 * Team: "小组"小组
 * Coding by 2013922
 * This is the form of backend news
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use common\models\Newsstatus;//新增
use yii\helpers\ArrayHelper;//新增
use common\models\Adminuser;//新增
/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php 
	/*
	第一种方法：
	$psObjs = Poststatus::find()->all();
	$allStatus = ArrayHelper::map($psObjs,'id','name');
	
	第二种方法：
	$psArray = Yii::$app->db->createCommand('select id,name from poststatus')->queryAll();
	$allStatus = ArrayHelper::map($psArray,'id','name');
	
	第三种方法：*/
	$allStatus = (new \yii\db\Query())
	->select(['name','id'])
	->from('newsstatus')
	->indexBy('id')
	->column();
	
	// 第四种方法：
	// allStatus = Newsstatus::find()
	// ->select(['name','id'])
	// ->orderBy('position')
	// ->indexBy('id')
	// ->column();
	
	

	
	?>

    <?= $form->field($model,'status')
         ->dropDownList(Newsstatus::find()
						->select(['name','id'])
						->orderBy('position')
						->indexBy('id')
						->column(),
    		   ['prompt'=>'请选择状态']);?>
     		   


        <?= $form->field($model,'author_id')
         ->dropDownList(Adminuser::find()
						->select(['nickname','id'])
						->indexBy('id')
						->column(),
    		   ['prompt'=>'请选择作者']);?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
