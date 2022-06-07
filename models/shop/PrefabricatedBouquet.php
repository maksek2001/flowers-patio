<?php

namespace app\models\shop;

/**
 * Сборные букеты
 */
class PrefabricatedBouquet extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{prefabricated_bouquets}}';
    }

    public static function getAllBouquets()
    {
        return PrefabricatedBouquet::find()->all();
    }

    public static function findMaxId()
    {
        return PrefabricatedBouquet::find()->max('id');
    }

    public static function findBouquetItemIds($id)
    {
        return PrefabricatedBouquet::find()
            ->select('item_id')
            ->where(['id' => $id]);
    }

    public static function findBouquetItemsCount($id)
    {
        return PrefabricatedBouquet::find()
            ->select('item_count')
            ->where(['id' => $id])
            ->all();
    }


    /**
     * @param int $id
     * @param int $item_id
     * @param double $item_count
     */
    public function create($id, $item_id, $item_count): bool
    {
        $bouquet = new PrefabricatedBouquet();

        $bouquet->id = $id;
        $bouquet->item_id = $item_id;
        $bouquet->item_count = $item_count;

        return $bouquet->save(false);
    }
}
