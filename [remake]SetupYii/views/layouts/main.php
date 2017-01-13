<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
        'brandLabel' => Yii::t('app', 'My Company'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $navItems = [
        ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app', 'Status'), 'url' => ['/status/index']],
        ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
        ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
        Yii::$app->user->isGuest ?
            ['label' => Yii::t('app', 'Sign In'), 'url' => ['/user/security/login']] :
            ['label' => Yii::t('app', 'Sign Out') . ' (' . Yii::$app->user->identity->username . ')',
                'url' => ['/user/security/logout'],
                'linkOptions' => ['data-method' => 'post']],
        ['label' => Yii::t('app', 'Register'), 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
    ];
//    if (Yii::$app->user->isGuest) {
//        array_push($navItems,
//            ['label' => 'Sign In', 'url' => ['/user/login']],
//            ['label' => 'Sign Up', 'url' => ['/user/register']]
//        );
//    } else {
////        array_push($navItems,
////            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
////                'url' => ['/site/logout'],
////                'link']
////            );
//        array_push($navItems,
//            (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        );
//    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
//            [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'Status', 'url' => ['/status/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        ],
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
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
