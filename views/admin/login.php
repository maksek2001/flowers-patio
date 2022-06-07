<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\widgets\Alert;

$this->title = 'Авторизация '. Yii::$app->name ;
?>
<div class="form-block text-center">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните поля для авторизации</p>

    <?php Alert::begin();?>
    <?php Alert::end(); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [
            'class' => 'justify-content-center my-form'
        ],
        'method' => 'post'
    ]); ?>

    <?= $form->field($loginForm, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($loginForm, 'password')->passwordInput() ?>

    <?= Html::submitButton('Авторизоваться', ['class' => 'btn btn-secondary']) ?>


    <?php ActiveForm::end(); ?>

</div>