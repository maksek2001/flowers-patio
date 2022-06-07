<?php

use yii\helpers\Html;

$this->title = Yii::$app->name;
?>

<div class="orders-container">
    <div class="orders-block basic-orders">
        <h3>Обычные заказы</h3>
        <?php foreach ($basicOrders as $order) : ?>
            <div class="order">
                <h5 class="order-name">Заказ
                    <strong>
                        B<?= Html::encode($order->id) ?>
                    </strong>
                </h5>
                <div style="display: inline-flex;">
                    <strong class="order-field"><?= Html::encode($order->user_phone) ?></strong>
                    <p class="order-field"><?= Html::encode($order->time) ?></p>
                    <?= Html::a('Завершить заказ', "close-order?order_id=$order->id&type=basic", [
                        'class' => 'a-button',
                        'data' => [
                            'confirm' => 'Вы действительно хотите завершить заказ?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
                <div class="order-bouquet">
                    <strong class="order-field"><?= Html::encode($basicBouquets[$order->id]->name) ?></strong>
                    <p class="order-field"><?= nl2br($basicBouquets[$order->id]->content) ?></p>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <div class="orders-block prefabricated-orders">
        <h3>Заказы из "Собери сам"</h3>
        <?php foreach ($prefabricatedOrders as $order) : ?>
            <div class="order">
                <h5 class="order-name">Заказ
                    <strong>
                        S<?= Html::encode($order->id) ?>
                    </strong>
                </h5>
                <p>Стоимость:
                    <strong class="order-field">
                        <?= Html::encode($order->total_price) ?> руб.
                    </strong>
                </p>
                <div style="display: inline-flex;">
                    <strong class="order-field"><?= Html::encode($order->user_phone) ?></strong>
                    <p class="order-field"><?= Html::encode($order->time) ?></p>
                    <?= Html::a('Завершить заказ', "close-order?order_id=$order->id&type=prefabricated", [
                        'class' => 'a-button',
                        'data' => [
                            'confirm' => 'Вы действительно хотите завершить заказ?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
                <div class="order-bouquet">
                    <div class="order-field">
                        <strong class="order-field">Состав букета: </strong>
                        <?php for ($i = 0; $i < count($bouquetItems[$order->id]); $i++) : ?>
                            <p>
                                <?= Html::encode($bouquetItems[$order->id][$i]->name) ?>
                                <?= Html::encode($bouquetItemsCount[$order->id][$i]->item_count) ?>
                            </p>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</div>