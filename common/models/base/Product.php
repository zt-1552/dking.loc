<?php

namespace common\models\base;

use Yii;
use common\models\base\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $title
 * @property string|null $content
 * @property int|null $price
 * @property int|null $old_price
 * @property string $meta_title
 * @property string|null $meta_description
 * @property string|null $image
 * @property int|null $is_offer
 * @property int|null $created_at
 *
 * @property Category $category
 */
class Product extends ActiveRecord
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
            [['category_id', 'price', 'old_price', 'is_offer', 'created_at'], 'integer'],
            [['content'], 'string'],
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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'content' => 'Content',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'image' => 'Image',
            'is_offer' => 'Is Offer',
            'created_at' => 'Created At',
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
}
