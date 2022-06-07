<?php

namespace app\models\shop;

/**
 * Наши букеты
 */
class BasicBouquet extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return '{{basic_bouquets}}';
    }

    public static function findMinPrice()
    {
        return BasicBouquet::find()->min('price');
    }

    public static function getAllBouquets()
    {
        return BasicBouquet::find()->all();
    }

    public static function getHeadBouquets()
    {
        return BasicBouquet::find()->limit(6)->all();
    }

    public function create(): bool
    {
        return $this->save(false);
    }
}
