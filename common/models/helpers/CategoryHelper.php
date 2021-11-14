<?php

namespace common\models\helpers;


use common\models\base\Category;
use common\models\CategoryAttributes;
use common\models\Values;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class CategoryHelper
{


    /**
     * @param $category_id
     * @return array|mixed|\yii\db\ActiveRecord[]
     */
    public static function getAllCategoryAttributesAndValues($category_id)
    {

        //get cache
        $allCategoryAttributesValues = \Yii::$app->cache->get('AllCategoryAttributesAndValues_'.$category_id);
        if ($allCategoryAttributesValues) {
            return $allCategoryAttributesValues;
        }

        $allCategoryAttributesValues = CategoryAttributes::find()->where(['category_id' => $category_id])->with('attributes0')->asArray()->all();
        if (!empty($allCategoryAttributesValues)) {
            foreach ($allCategoryAttributesValues as &$categoryAttribute):
                $values = Values::find()->asArray()->where(['attributes_id' => $categoryAttribute['attributes0']['id']])->all();
                $categoryAttribute['attributeValue'] = $values;
            endforeach;
        }

        //set cache
        \Yii::$app->cache->set('AllCategoryAttributesAndValues_'.$category_id, $allCategoryAttributesValues, 300);

        return $allCategoryAttributesValues;
    }


    /**
     * @param $category_id
     * @return array
     */
    public static function getCategoryAttributesIds($category_id)
    {
        $categoryAttributes = CategoryAttributes::find()->where(['category_id' => $category_id])->asArray()->all();
        $categoryAttributesIds = ArrayHelper::getColumn($categoryAttributes, 'attributes_id');

        return $categoryAttributesIds;
    }


    /**
     * @param $category_id
     * @param array $attributes_to_save
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public static function changeCategoryAttributes($category_id, $attributes_to_save = [])
    {
        $old_attributes = CategoryAttributes::find()->where(['category_id' => $category_id])->all();

        if (!empty($attributes_to_save)) {

            //delete all we don't need
            foreach ($old_attributes as $key => $old_attribute)
                if (!in_array($old_attribute->attributes_id, $attributes_to_save))
                {
                    $old_attribute->delete();
                    unset($old_attributes[$key]);
                }
            $oldAttributesIds = ArrayHelper::getColumn($old_attributes, 'attributes_id');

            foreach ($attributes_to_save as $item){
                if (!in_array($item, $oldAttributesIds)){
                    $new_attribute = new CategoryAttributes();
                    $new_attribute->category_id = $category_id;
                    $new_attribute->attributes_id = $item;
                    $new_attribute->save();
                }
            }
        } else {
            foreach ($old_attributes as $key => $old_attribute)
                {
                    $old_attribute->delete();
                }
        }

    }





}