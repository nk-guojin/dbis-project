<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Newscomment */

$this->title = 'Update Newscomment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Newscomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="newscomment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
