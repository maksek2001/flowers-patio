<?php

use app\assets\AdminAsset;
use app\widgets\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\NavBar;

AdminAsset::register($this);
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
        <div class="main-header">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'header navbar navbar-expand-md navbar-primary fixed-top pt-3 pb-3',
                ],
            ]);
            ?>
            <ul id="w1" class="navbar-nav nav">
                <li class="nav-item">
                    <a class="nav-link" href="/purchase/bouquets">
                        <img src="/web/public/images/icons/flowers.png" class='middle-icon'>
                        Наши предложения
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/make-self/main">
                        <img src="/web/public/images/icons/flowers.png" class='middle-icon'>
                        Собери сам
                    </a>
                </li>
                <?php if ($this->context->role == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/office/main">
                            Панель администратора
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!Yii::$app->user->isGuest) : ?>
                    <li class="nav-item">
                        <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline']); ?>
                        <button type="submit" class="btn btn-link logout">
                            Выйти
                            (<?= Yii::$app->user->identity->username ?>)
                            <?= $this->context->role == 'admin' ? 'Администратор' : '' ?>
                        </button>
                        <?= Html::endForm(); ?>
                    </li>
                <?php endif; ?>
            </ul>
            <?php NavBar::end(); ?>
        </div>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container-fluid main-container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <?= $this->render('main/footer.php'); ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>