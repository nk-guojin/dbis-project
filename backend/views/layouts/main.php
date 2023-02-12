<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '“小组”小组互联网数据库',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (!Yii::$app->user->isGuest){
        $menuItems = [
            ['label' => '首页', 'url' => ['/site/index']],
            ['label' => '博客', 'url' => ['/post/index']],
            ['label' => '博客评论', 'url' => ['/comment/index']],
            ['label' => '新闻', 'url' => ['/news/index']],
            ['label' => '新闻评论', 'url' => ['/newscomment/index']],
            ['label' => '用户', 'url' => ['/user/index']],
            ['label' => '管理员', 'url' => ['/adminuser/index']],
        ];
    }
    else
    {
        $menuItems = [
            ['label' => '首页', 'url' => ['/site/index']],
            ['label' => '博客', 'url' => ['/site/index']],
            ['label' => '博客评论', 'url' => ['/site/index']],
            ['label' => '新闻', 'url' => ['/site/index']],
            ['label' => '新闻评论', 'url' => ['/site/index']],
            ['label' => '用户', 'url' => ['/site/index']],
            ['label' => '管理员', 'url' => ['/site/index']],
        ];
    }
    /*
    $menuItems = [
        ['label' => '首页', 'url' => ['/site/index']],
            ['label' => '博客', 'url' => ['/post/index']],
            ['label' => '博客评论', 'url' => ['/comment/index']],
            ['label' => '新闻', 'url' => ['/news/index']],
            ['label' => '新闻评论', 'url' => ['/newscomment/index']],
            ['label' => '用户', 'url' => ['/user/index']],
            ['label' => '管理员', 'url' => ['/adminuser/index']],
    ];*/
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '注销登录 (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
