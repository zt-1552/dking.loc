<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "category_attributes".
 *
 * @property int $category_id
 * @property int $attributes_id
 *
 * @property Attributes $attributes0
 * @property Category $category
 */
class CategoryAttributes extends \common\models\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_attributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'attributes_id'], 'required'],
            [['category_id', 'attributes_id'], 'integer'],
            [['category_id', 'attributes_id'], 'unique', 'targetAttribute' => ['category_id', 'attributes_id']],
            [['attributes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attributes::class, 'targetAttribute' => ['attributes_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Категория',
            'attributes_id' => 'Атрибут/фильтр',
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
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
