<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\OrdersItem;
use common\models\Orders;
use common\models\Cart;
use common\models\Product;

class CartController extends AppController
{

    public $layout = 'front1';

    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }

        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->AddToCart($product);

        if(\Yii::$app->request->isAjax) {
//            $session->destroy();
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionShow()
    {
        $session = \Yii::$app->session;
        $session->open();
            return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionDelItem ($id)
    {
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        if (\Yii::$app->request->isAjax) {
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionCleanCart ()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionCheckout()
    {
        \Yii::$app->params['main_categories'] = (new \common\models\Category) -> getMainCategories();

        $session = \Yii::$app->session;
        $session->open();

        $formOrders = new Orders();
        $formOrdersItem = new OrdersItem();

        if($formOrders->load(\Yii::$app->request->post())) {
            $formOrders->summa = $session['cart.sum'];
            $transaction = \Yii::$app->getDb()->beginTransaction();
//            debug($formOrders);
            if (!$formOrders->save() || !$formOrdersItem->saveOrdersItem($session['cart'], $formOrders->id)) {
                $transaction->rollBack();
                \Yii::$app->session->setFlash('error', 'Ошибка сохранения заказа!');
            } else {
                $transaction->commit();
                \Yii::$app->session->setFlash('success', 'Заказ принят!');

                \Yii::$app->mailer->compose('order', ['cart' => $session['cart'], 'qty' => $session['cart.qty'], 'sum' => $session['cart.sum']])
                    ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName']])
                    ->setTo($formOrders->email, \Yii::$app->params['adminEmail'])
                    ->setSubject('Заказ на сайте')
                    ->send();

//                debug($session['cart']);

                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return  $this->refresh();
            }
        }


        return $this->render('checkout', compact('session', 'formOrders', 'formOrdersItem'));
    }

    public function actionChangeCart()
    {
        $id = \Yii::$app->request->get('id');
        $qty = \Yii::$app->request->get('qty');
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }

        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->AddToCart($product, $qty);

        return $this->renderPartial('cart-modal', compact('session'));
    }

}