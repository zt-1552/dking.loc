<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string $meta_title
 * @property string|null $meta_description
 * @property string|null $content
 * @property string|null $short_content
 * @property string|null $image
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Attributes[] $attributes0
 * @property CategoryAttributes[] $categoryAttributes
 * @property Product[] $products
 */
class Category extends \common\models\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['name', 'meta_title'], 'required'],
            [['meta_description', 'content', 'short_content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'meta_title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'name' => 'Наименование',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'content' => 'Content',
            'short_content' => 'Short Content',
            'image' => 'Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Attributes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes0()
    {
        return $this->hasMany(Attributes::class, ['id' => 'attributes_id'])->viaTable('category_attributes', ['category_id' => 'id']);
    }

    /**
     * Gets query for [[CategoryAttributes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryAttributes()
    {
        return $this->hasMany(CategoryAttributes::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }
}
