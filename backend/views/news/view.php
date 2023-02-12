<?php


/**
 * Team: "小组"小组
 * Coding by 2013544
 * This is the view of backend news
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '新闻', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定删除这条新闻吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!--DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
            'tags:ntext',
            'status',
            'create_time:datetime',
            'update_time:datetime',
            'author_id',
        ],
    ]) ?>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'content:ntext',
                [
                    'attribute'=>'title',
                    'label'=>'新闻标题',
                    'value'=>$model->title,
                ],
                [
                    'attribute'=>'create_time',
                    'label'=>'创建时间',
                    'format'=>['date','php:Y-m-d H:i:s']
                ],
                [
                    'attribute'=>'author_id',
                    'label'=>'作者id',
                    'value'=>$model->author_id,
                ],
                [
                    'attribute'=>'tags',
                    'label'=>'标签',
                    'value'=>$model->tags,
                ],
                [
                    'attribute'=>'content',
                    'label'=>'正文',
                    'value'=>$model->content,
                ],
                [
                    'attribute'=>'status',
                    'label'=>'新闻状态',
                    'value'=>$model->status0->name,
                ],
        ],
    ]) ?>

</div>
