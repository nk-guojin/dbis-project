<?php


/**
 * Team: "小组"小组
 * Coding by 2013544
 * This is the index of backend post
 */

use common\models\Poststatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '博客';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('创建博客', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'label'=>'博客标题',
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
                'filter'=>Poststatus::find()
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
