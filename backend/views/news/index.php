<?php


/**
 * Team: "小组"小组
 * Coding by 2013922
 * This is the index of backend news
 */

use common\models\Newsstatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建新闻', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--/*GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'tags:ntext',
            'status',
            //'create_time:datetime',
            //'update_time:datetime',
            //'author_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'id',
                'contentOptions'=>['width'=>'30px'],
            ],
            [
                'attribute'=>'content',
                'label'=>'正文',
                'value'=>'beginning',
            ],
            [
                'attribute'=>'author_id',
                'label'=>'作者id',
                'value'=>'author_id',
            ],
            [
                'attribute'=>'title',
                'label'=>'新闻标题',
                'value'=>'title',
            ],
            [
                'attribute'=>'create_time',
                'label'=>'创建时间',
                'format'=>['date','php:m-d H:i'],
            ],
            [
                'attribute'=>'status',
                'value'=>'status0.name',
                'filter'=>Newsstatus::find()
                    ->select(['name','id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column(),
                'contentOptions'=>
            		function($model)
            		{
            			return ($model->status==1)?['class'=>'bg-danger']:[];
            		}
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete} {approve}',
                
            ],
        ],
    ]); ?>

</div>
