<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\widgets\Alert;

$this->title = 'Заказ букета ' . Yii::$app->name;
?>
<div class="form-block text-center">
    <h4><?= Html::encode($this->title) ?></h4>

    <?php Alert::begin(); ?>
    <?php Alert::end(); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'purchase-form',
        'options' => [
            'class' => 'justify-content-center my-form'
        ],
        'method' => 'post'
    ]); ?>

    <?= $form->field($purchaseForm, 'total_price')->textInput(['class' => 'form-control total-price', 'value' => $bouquet->price, 'readonly' => true]); ?>
    <?= $form->field($purchaseForm, 'phone')->textInput() ?>

    <?= Html::submitButton('Заказать букет', ['class' => 'btn btn-secondary']) ?>


    <?php ActiveForm::end(); ?>

</div>