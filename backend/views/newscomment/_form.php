<?php


/**
 * Team: "小组"小组
 * Coding by 2012516
 * This is the form of backend newscomment
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Newscomment;
use common\models\Commentstatus;

/* @var $this yii\web\View */
/* @var $model common\models\Newscomment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newscomment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'status')->dropDownList(Commentstatus::find()
                                    ->select(['name','id'])
                                    ->orderBy('position')
                                    ->indexBy('id')
                                    ->column(),
                                    ['prompt'=>'请选择状态']); ?>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
