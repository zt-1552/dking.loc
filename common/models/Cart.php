<?php


namespace common\models;


class Cart extends \yii\base\Model
{

    public function AddToCart($product, $qty = 1)
    {
        if(isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title,
                'price' => $product->price,
                'image' => $product->image,
                'qty' => $qty,
            ];
        }

        $_SESSION['cart.qtw'] = isset($_SESSION['cart.qtw']) ? $_SESSION['cart.qtw'] + $qty : $qty;
        $_SESSION['cart.sum'] = (isset($_SESSION['cart.sum'])) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }

}