<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product_values".
 *
 * @property int $product_id
 * @property int $values_id
 *
 * @property Product $product
 * @property Values $values
 */
class ProductValues extends \common\models\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'values_id'], 'required'],
            [['product_id', 'values_id'], 'integer'],
            [['product_id', 'values_id'], 'unique', 'targetAttribute' => ['product_id', 'values_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['values_id'], 'exist', 'skipOnError' => true, 'targetClass' => Values::class, 'targetAttribute' => ['values_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'values_id' => 'Values ID',
        ];
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

    /**
     * Gets query for [[Values]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getValues()
    {
        return $this->hasOne(Values::class, ['id' => 'values_id']);
    }
}
