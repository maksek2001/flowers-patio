<?php

namespace app\models\forms;

use app\models\shop\BasicOrder;
use yii\base\Model;

/**
 * Форма для покупки
 */
class PurchaseForm extends Model
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

    public function checkout($bouquet_id)
    {
        $order = new BasicOrder();
        return $order->create($bouquet_id, $this->phone, $this->total_price);
    }
}
