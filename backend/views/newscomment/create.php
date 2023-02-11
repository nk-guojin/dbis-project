<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Newscomment */

$this->title = 'Create Newscomment';
$this->params['breadcrumbs'][] = ['label' => 'Newscomments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newscomment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
