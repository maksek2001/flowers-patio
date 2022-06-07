<?php

namespace app\controllers;

use Yii;
use app\models\forms\LoginForm;
use app\models\shop\BasicBouquet;
use app\models\shop\BasicOrder;
use app\models\shop\BouquetItem;
use app\models\shop\PrefabricatedBouquet;
use app\models\shop\PrefabricatedOrder;

/**
 * Контроллер для панели администратора
 */
class AdminController extends SiteController
{

    public $layout = 'admin';

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginForm = new LoginForm();
        if ($loginForm->load(Yii::$app->request->post())) {
            if ($loginForm->login()) {
                return $this->redirect(['main']);
            } else {
                Yii::$app->session->setFlash('error', 'Не удалось авторизоваться!');
            }
        }

        $loginForm->password = '';

        return $this->render('login', [
            'loginForm' => $loginForm,
        ]);
    }

    public function actionMain()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        $basicOrders = BasicOrder::getAllActiveOrders();
        $basicBouquets = [];

        foreach ($basicOrders as $order) {
            $basicBouquets[$order->id] = BasicBouquet::findOne(['id' => $order->id]);
        }

        $prefabricatedOrders = PrefabricatedOrder::getAllActiveOrders();
        $bouquetItems = [];
        $bouquetItemsCount = [];

        foreach ($prefabricatedOrders as $order) {
            $itemIds = PrefabricatedBouquet::findBouquetItemIds($order->id);
            $itemsCount = PrefabricatedBouquet::findBouquetItemsCount($order->id);

            $bouquetItems[$order->id] = BouquetItem::findByIds($itemIds);
            $bouquetItemsCount[$order->id] = $itemsCount;
        }

        return $this->render('main', [
            'basicOrders' => $basicOrders,
            'basicBouquets' => $basicBouquets,
            'prefabricatedOrders' => $prefabricatedOrders,
            'bouquetItems' => $bouquetItems,
            'bouquetItemsCount' => $bouquetItemsCount
        ]);
    }

    public function actionCloseOrder()
    {
        $orderId = $_GET['order_id'];
        $type = $_GET['type'];

        switch ($type) {
            case 'basic':
                BasicOrder::updateStatus($orderId, 'closed');
                break;
            case 'prefabricated':
                PrefabricatedOrder::updateStatus($orderId, 'closed');
                break;
        }

        return $this->redirect('main');
    }
}
