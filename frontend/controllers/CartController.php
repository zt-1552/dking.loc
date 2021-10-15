<?php


namespace frontend\controllers;


use backend\components\AppController;
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

        return $this->render('checkout', compact('session'));
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