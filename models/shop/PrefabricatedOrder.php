<?php

namespace app\models\shop;

use DateTime;

/**
 * Заказы букетов "Собери сам"
 */
class PrefabricatedOrder extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = "active";

    public static function tableName()
    {
        return '{{prefabricated_orders}}';
    }

    public static function getAllActiveOrders()
    {
        return PrefabricatedOrder::find()
            ->where(['status' => self::STATUS_ACTIVE])
            ->orderBy(['id' => SORT_ASC])
            ->all();
    }

    public static function updateStatus($order_id, $status): bool
    {
        $order = PrefabricatedOrder::findOne($order_id);
        $order->status = $status;
        return $order->save(false);
    }

    /**
     * @param int $bouquet_id
     * @param string $user_phone
     * @param double $total_price
     */
    public function create($bouquet_id, $user_phone, $total_price): int
    {
        $order = new PrefabricatedOrder();

        $order->bouquet_id = $bouquet_id;
        $order->user_phone = $user_phone;
        $order->total_price = $total_price;
        $now = new DateTime();
        $order->time = $now->format('Y-m-d H:i:s');
        $order->save(false);

        return $order->id;
    }
}
