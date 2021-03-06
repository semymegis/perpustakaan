<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use mdm\admin\components\Helper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Perpustakaan',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right','innerContainerOptions' => ['class'=>'container-fluid']],
    //         'encodeLabels' => false,
    //         'items' => [
    //             Yii::$app->user->isGuest ? ( "" ) : (
    //                 ['label' => 'Dashboard', 'url' => ['/dashboard/index']]
    //             ),
    //         ['label' => 'Home', 'url' => ['/default']],
    //
    //         ['label' => 'Indeks Buku', 'url' => ['/buku']],
    //         Yii::$app->user->isGuest ?
    //         ['label' => 'Sign in', 'url' => ['/user/security/login']] :
    //         ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
    //             'url' => ['/user/security/logout'],
    //             'linkOptions' => ['data-method' => 'post']],
    //
    //
    //     ],
    // ]);

    $dash ="";
    if(!Yii::$app->user->isGuest ) {
        if(Yii::$app->user->identity->username == "semy") {
         $dash = ['label' => 'Dashboard', 'url' => ['/dashboard/index']];
        }

    }


    $menuItems = [

                $dash,
               ['label' => 'Home', 'url' => ['/default']],
               Yii::$app->user->isGuest ? '' :['label' => 'Peminjaman', 'url' => ['/pinjaman']],
               ['label' => 'Indeks Buku', 'url' => ['/buku']],
              
               Yii::$app->user->isGuest ?
               ['label' => 'Sign in', 'url' => ['/user/security/login']] :
               ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
                   'url' => ['/user/security/logout'],
                   'linkOptions' => ['data-method' => 'post']],

];

// $menuItems = Helper::filter($menuItems);

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
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Perpustakaan <?= date('Y') ?></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
