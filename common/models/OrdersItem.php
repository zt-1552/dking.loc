<?php


namespace common\models;

use common\models\base\OrdersItem as baseOrdersItem;


class OrdersItem extends baseOrdersItem
{
    public function saveOrdersItem($products, $orders_id)
    {
//        debug($products);
        foreach ($products as $id => $product){
            $this->id = null;
            $this->isNewRecord = true;
            $this->orders_id = $orders_id;
            $this->product_id = $id;
            $this->product_name = $product['title'];
            $this->price = $product['price'];
            $this->quantity = $product['qty'];
            $this->summa = $product['qty'] * $product['price'];
//            debug($this);
            if(!$this->save()) {
                return false;
            }
        }
        return  true;
    }

}