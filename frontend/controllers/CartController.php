<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Cart;
use common\models\Product;

class CartController extends AppController
{

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
        return $this->renderPartial('cart-modal', compact('session'));
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

}