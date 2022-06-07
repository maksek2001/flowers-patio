<?php

namespace app\models\forms;

use yii\base\Model;

/**
 * Форма для сборки букета
 */
class MakeBouquetForm extends Model
{

    /** @var double $total_price */
    public $total_price;

    /** @var string $phone */
    public $phone;

    public function attributeLabels()
    {
        return [
            'total_price' => "Итоговая стоимость",
            'phone' => 'Номер телефона'
        ];
    }

    public function rules()
    {
        return [
            [['phone'], 'required', 'message' => 'Обязательное поле!'],
            ['phone', 'match', 'pattern' => '/^((\+7|7|8)+([0-9]){10})$/i', 'message' => 'Введён недопустимый номер телефона'],
        ];
    }
}
