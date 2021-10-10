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
            $session->destroy();
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionShow()
    {
        $session = \Yii::$app->session;
        $session->open();
//            $session->destroy();
            return $this->renderPartial('cart-modal', compact('session'));
    }

}