<?php


/**
 * Team: "小组"小组
 * Coding by 2012516, 2011431
 * This is the create of backend adminuser
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\widgets\ActiveForm;
//use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '新增管理员';
$this->params['breadcrumbs'][] = ['label' => '管理员', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adminuser-create">

    <h1><?= Html::encode($this->title) ?></h1>


		<div class="adminuser-form">
		
		    <?php $form = ActiveForm::begin(); ?>
		 
		    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
		 	
		    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
		    
		    <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>

		    <div class="form-group">
		        <?= Html::submitButton('新增', ['class' =>'btn btn-success']) ?>
		    </div>
		   
		    <?php ActiveForm::end(); ?>
		
		</div>
    

</div>
