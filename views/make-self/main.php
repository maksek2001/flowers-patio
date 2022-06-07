<?php

use yii\bootstrap4\ActiveForm;
use app\widgets\Alert;
use yii\helpers\Html;

$this->title = Yii::$app->name;
?>

<div class="self-container">
    <p class="item-info"> * Цены указаны за одну единицу измерения (штука, метр, кв. метр) </p>
    <?php if ($flowers != NULL) : ?>
        <div class="text-block flowers">
            <details style="width: 100%;">
                <summary class="summary-shop custom-h" style="width: 100%;">
                    <img src="/web/public/images/icons/flowers.png" class='middle-icon'> Цветы
                </summary>
                <div id="flowers" class="items">
                    <?php foreach ($flowers as $flower) : ?>
                        <div class="item">
                            <a href="/web/public/images/bouquet_items/<?= Html::encode($flower->image) ?>" target='_blank'>
                                <img class="item-img" src="/web/public/images/bouquet_items/<?= Html::encode($flower->image) ?>" alt="<?= Html::encode($flower->name) ?>">
                            </a>
                            <strong class="item-name"><?= Html::encode($flower->name) ?></strong>
                            <div class="item-info">
                                <strong class="bouquet-price"><?= Html::encode($flower->price) ?> руб. </strong>
                                <div class="number">
                                    <button type="button" class="minus">-</button>
                                    <input type='number' data-id="<?= Html::encode($flower->id) ?>" data-price="<?= Html::encode($flower->price) ?>" class="count" onfocus="this.oldValue = this.value;" type="text" value="0" placeholder="Введите количество">
                                    <button type="button" class="plus">+</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </details>
        </div>
    <?php endif; ?>

    <?php if ($decorations != NULL) : ?>
        <div class="text-block flowers">
            <details style="width: 100%;">
                <summary class="summary-shop custom-h" style="width: 100%;">
                    <img src="/web/public/images/icons/flowers.png" class='middle-icon'> Дополнительные украшения
                </summary>
                <div id="decorations" class="items">
                    <?php foreach ($decorations as $decoration) : ?>
                        <div data-id="<?= $decoration->id ?>" class="item">
                            <a href="/web/public/images/bouquet_items/<?= Html::encode($decoration->image) ?>" target='_blank'>
                                <img class="item-img" src="/web/public/images/bouquet_items/<?= Html::encode($decoration->image) ?>" alt="<?= Html::encode($decoration->name) ?>">
                            </a>
                            <strong class="item-name"><?= Html::encode($decoration->name) ?></strong>
                            <div class="item-info">
                                <strong class="bouquet-price"><?= Html::encode($decoration->price) ?> руб. </strong>
                                <div class="number">
                                    <button type="button" class="minus">-</button>
                                    <input type='number' data-id="<?= Html::encode($decoration->id) ?>" data-price="<?= Html::encode($decoration->price) ?>" class="count" onfocus="this.oldValue = this.value;" type="text" value="0" placeholder="Введите количество">
                                    <button type="button" class="plus">+</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </details>
        </div>
    <?php endif; ?>

    <div class="form-block  text-center">
        <?php Alert::begin(); ?>
        <?php Alert::end(); ?>

        <?php $form = ActiveForm::begin([
            'id' => 'make-bouquet-form',
            'options' => [
                'class' => 'justify-content-center my-form'
            ],
            'method' => 'post'
        ]); ?>

        <?= $form->field($makeBouquetForm, 'total_price')->textInput(['class' => 'form-control total-price', 'name' => 'total_price', 'id' => 'total-price', 'value' => 0, 'readonly' => true]); ?>
        <?= $form->field($makeBouquetForm, 'phone')->textInput(['name' => 'phone']) ?>

        <?= Html::submitButton('Заказать букет', ['class' => 'btn btn-secondary']) ?>


        <?php ActiveForm::end(); ?>

    </div>

</div>