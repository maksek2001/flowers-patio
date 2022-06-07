<?php

use yii\bootstrap4\NavBar;

?>

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
        </ul>
        <ul id="w2" class="navbar-nav right nav">
            <li class="nav-item">
                <a class="nav-link">
                    <img src="/web/public/images/icons/phone.png" class='middle-icon'>
                    +79998887766
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <img src="/web/public/images/icons/mail.png" class='middle-icon'>
                    flowerspatio@mail.ru
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                    <img src="/web/public/images/icons/shop.png" class='middle-icon'>
                    ул. Петрова, 99
                </a>
            </li>
        </ul>
        <?php NavBar::end(); ?>
    </div>
</header>