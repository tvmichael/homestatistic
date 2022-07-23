<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    $menuItems = [];

    if(Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'About', 'url' => ['/site/about']];
        $menuItems[] = ['label' => 'Contact', 'url' => ['/site/contact']];

        $menuItems[] = ['label' => 'Registration', 'url' => ['/site/registration']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'New purchase', 'url' => ['/purchase/add']];
        $menuItems[] = ['label' => 'Statistic', 'items' => [
            ['label' => 'N ', 'url' => '/site/statistic'],
            ['label' => 'P', 'url' => '/site/statistic'],
        ]];
        $menuItems[] = ['label' => 'Product', 'items' => [
            ['label' => 'Product list', 'url' => '/product'],
            ['label' => 'Product category list', 'url' => '/product-category'],
            ['label' => 'Spending list', 'url' => '/spending'],
            //'<div class="dropdown-divider"></div>',
        ]];
        $menuItems[] = ['label' => 'About', 'url' => ['/site/about']];
        $menuItems[] = ['label' => 'Contact', 'url' => ['/site/contact']];
        $menuItems[] = (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', [
                'class' => 'form-inline',
                'data-user-id' => Yii::$app->user->getId(),
            ])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        );
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems
    ]);

    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-2 text-muted">
    <div class="container">
        <p class="float-left">&copy; Home Company <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
