<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string|null $content
 * @property int $price
 * @property int|null $old_price
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $image
 * @property int|null $is_offer
 * @property string|null $created_at
 * @property int|null $bestsellers
 *
 * @property Category $category
 * @property OrdersItem[] $ordersItems
 * @property ProductValues[] $productValues
 * @property Values[] $values
 */
class Product extends \common\models\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'price'], 'required'],
            [['category_id', 'price', 'old_price', 'is_offer', 'bestsellers'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'meta_title', 'meta_description', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title' => 'Название',
            'content' => 'Content',
            'price' => 'Цена',
            'old_price' => 'Старая цена',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'image' => 'Картинка',
            'is_offer' => 'Распродажа',
            'created_at' => 'Created At',
            'bestsellers' => 'Bestsellers',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[OrdersItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItem::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductValues()
    {
        return $this->hasMany(ProductValues::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Values]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getValues()
    {
        return $this->hasMany(Values::className(), ['id' => 'values_id'])->viaTable('product_values', ['product_id' => 'id']);
    }
}
