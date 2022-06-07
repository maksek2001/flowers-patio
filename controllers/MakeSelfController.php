<?php

namespace app\controllers;

use Yii;
use app\models\shop\BasicBouquet;
use app\models\shop\BouquetItem;
use app\models\forms\MakeBouquetForm;
use app\models\shop\PrefabricatedBouquet;
use app\models\shop\PrefabricatedOrder;

/**
 * Контроллер для "Сделай сам"
 */
class MakeSelfController extends SiteController
{

    public $layout = 'make-self';

    public function actionBouquets()
    {
        return $this->render('bouquets', [
            'bouquets' => BasicBouquet::getAllBouquets()
        ]);
    }

    public function actionMain()
    {
        $makeForm = new MakeBouquetForm();

        return $this->render('main', [
            'makeBouquetForm' => $makeForm,
            'flowers' => BouquetItem::getAllItemsByType('flower'),
            'decorations' => BouquetItem::getAllItemsByType('decoration')
        ]);
    }

    public function actionMake()
    {
        $totalPrice = +$_POST['total_price'];
        if ($totalPrice > 0) {
            $orderElementsKeys = explode(",", $_POST['orderElementsKeys']);
            $orderElementsValues  = explode(",", $_POST['orderElementsValues']);

            $bouquet = new PrefabricatedBouquet();
            $bouquetId = $bouquet::findMaxId() + 1;

            // добавление всех элементов букета в БД
            for ($i = 0; $i < count($orderElementsKeys); $i++) {
                $bouquet->create($bouquetId, +$orderElementsKeys[$i], +$orderElementsValues[$i]);
            }

            $order = new PrefabricatedOrder();
            $orderId = $order->create($bouquetId, $_POST['phone'], +$_POST['total_price']);

            Yii::$app->session->setFlash('success', "Заказ принят. Номер вашего заказа: S" . $orderId);
        } else {
            Yii::$app->session->setFlash('error', "Вы не выбрали ни одного товара!");
        }
    }
}
