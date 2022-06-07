<?php

namespace app\models\shop;

/**
 * Элементы для "Собери сам"
 */
class BouquetItem extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{bouquet_items}}';
    }

    public static function getAllItems()
    {
        return BouquetItem::find()->all();
    }

    public static function findByIds($ids)
    {
        return BouquetItem::find()
            ->where(['in', 'id', $ids])
            ->all();
    }

    public static function getAllItemsByType($type)
    {
        return BouquetItem::find()
            ->where(['type' => $type])
            ->all();
    }

    public function create(): bool
    {
        return $this->save(false);
    }
}
