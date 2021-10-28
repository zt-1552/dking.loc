<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "values".
 *
 * @property int $id
 * @property int $attributes_id
 * @property string $value
 * @property string|null $slug
 *
 * @property Attributes $attributes0
 * @property ProductValues[] $productValues
 * @property Product[] $products
 */
class Values extends \common\models\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attributes_id', 'value'], 'required'],
            [['attributes_id'], 'integer'],
            [['value', 'slug'], 'string', 'max' => 100],
            [['attributes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::className(), 'targetAttribute' => ['attributes_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'attributes_id' => 'Attributes ID',
            'value' => 'Value',
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[Attributes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes0()
    {
        return $this->hasOne(Attributes::class, ['id' => 'attributes_id']);
    }

    /**
     * Gets query for [[ProductValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductValues()
    {
        return $this->hasMany(ProductValues::class, ['values_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id' => 'product_id'])->viaTable('product_values', ['values_id' => 'id']);
    }
}
