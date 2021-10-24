<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "attributes".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $type
 *
 * @property Category[] $categories
 * @property CategoryAttributes[] $categoryAttributes
 * @property Values[] $values
 */
class Attributes extends \common\models\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'string', 'max' => 80],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])->viaTable('category_attributes', ['attributes_id' => 'id']);
    }

    /**
     * Gets query for [[CategoryAttributes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryAttributes()
    {
        return $this->hasMany(CategoryAttributes::class, ['attributes_id' => 'id']);
    }

    /**
     * Gets query for [[Values]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getValues()
    {
        return $this->hasMany(Values::class, ['attributes_id' => 'id']);
    }
}
