<?php


/**
 * Team: "小组"小组
 * Coding by 2012516
 * This is the view of backend comment
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '博客评论', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定删除这条评论吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
                [
                'attribute'=>'status',
                'label'=>'状态',
                'value'=>$model->status0->name,
                ],
                [
                'attribute'=>'create_time',
                'label'=>'创建时间',
                'format'=>['date','php:Y-m-d H:i:s']
                ],
                [
                'attribute'=>'userid',
                'label'=>'用户名',
                'value'=>$model->user->username,
                ],
                [
                    'attribute'=>'email',
                    'label'=>'E-mail',
                ],
                [
                    'attribute'=>'url',
                    'label'=>'URL',
                ],
                [
                'attribute'=>'post_id',
                'label'=>'博客标题',
                'value'=>$model->post->title,
                ],
        ],
    ]) ?>

</div>
