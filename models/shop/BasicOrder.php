<?php

namespace app\models\shop;

use DateTime;

/**
 * Заказы наших букетов
 */
class BasicOrder extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = "active";

    public static function tableName()
    {
        return '{{basic_orders}}';
    }

    public static function getAllActiveOrders()
    {
        return BasicOrder::find()
            ->where(['status' => self::STATUS_ACTIVE])
            ->orderBy(['id' => SORT_ASC])
            ->all();
    }

    public static function updateStatus($order_id, $status): bool
    {
        $order = BasicOrder::findOne($order_id);
        $order->status = $status;
        return $order->save(false);
    }


    /**
     * @param int $bouquet_id
     * @param string $user_phone
     */
    public function create($bouquet_id, $user_phone): int
    {
        $order = new BasicOrder();

        $order->bouquet_id = $bouquet_id;
        $order->user_phone = $user_phone;

        $now = new DateTime();
        $order->time = $now->format('Y-m-d H:i:s');
        $order->save(false);

        return $order->id;
    }
}
