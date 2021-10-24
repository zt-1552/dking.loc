<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "orders_item".
 *
 * @property int $id
 * @property int $orders_id
 * @property int $product_id
 * @property string $product_name
 * @property int $price
 * @property int $quantity
 * @property string|null $comment
 * @property int $summa
 *
 * @property Orders $orders
 * @property Product $product
 */
class OrdersItem extends \common\models\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orders_id', 'product_id', 'product_name', 'price', 'quantity', 'summa'], 'required'],
            [['orders_id', 'product_id', 'price', 'quantity', 'summa'], 'integer'],
            [['product_name'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 100],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orders_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orders_id' => 'Orders ID',
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'comment' => 'Comment',
            'summa' => 'Summa',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::class, ['id' => 'orders_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
