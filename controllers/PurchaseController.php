<?php

namespace app\controllers;

use Yii;
use app\models\shop\BasicBouquet;
use app\models\forms\PurchaseForm;

/**
 * Контроллер для покупки наших букетов
 */
class PurchaseController extends SiteController
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
        $purchaseForm = new PurchaseForm();
        $bouquetId = $_GET['bouquet_id'];
        $bouquet = BasicBouquet::findOne(['id' => $bouquetId]);

        if ($purchaseForm->load(Yii::$app->request->post())) {
            $orderId = $purchaseForm->checkout($bouquetId);
            Yii::$app->session->setFlash('success', "Заказ принят. Номер вашего заказа: B" . $orderId);
        }

        return $this->render('main', [
            'purchaseForm' => $purchaseForm,
            'bouquet' => $bouquet
        ]);
    }
}
