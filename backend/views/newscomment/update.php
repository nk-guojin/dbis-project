<?php


/**
 * Team: "小组"小组
 * Coding by 2012516
 * This is the update of backend newscomment
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Newscomment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '新闻评论', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="newscomment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
