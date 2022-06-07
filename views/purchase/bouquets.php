<?php

use yii\helpers\Html;

$this->title = Yii::$app->name;
?>

<div class="bouquet-container">
    <?php if ($bouquets != NULL) : ?>
        <?php foreach ($bouquets as $bouquet) : ?>
            <div class="bouquet">
                <strong class="bouquet-name"> <?= Html::encode($bouquet->name) ?></strong>
                <a href="/web/public/images/bouquets/<?= Html::encode($bouquet->image) ?>" target='_blank'>
                    <img class="img" src="/web/public/images/bouquets/<?= Html::encode($bouquet->image) ?>" alt="<?= Html::encode($bouquet->name) ?>">
                </a>
                <div class="bouquet-info">
                    <div style="display: inline-flex;justify-content: center; margin-top: 10px;">
                        <strong class="bouquet-price"> Стоимость: <?= Html::encode($bouquet->price) ?> руб. </strong>
                        <a class="a-button" href="main?bouquet_id=<?= $bouquet->id ?>"> Заказать </a>
                    </div>
                    <details>
                        <summary class="summary-shop">
                            <img src="/web/public/images/icons/info.png" class='middle-icon'> Подробная информация
                        </summary>
                        <p class="info">
                            <?= nl2br($bouquet->content) ?>
                        </p>
                    </details>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>