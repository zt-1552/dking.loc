<?php


namespace common\models\helpers;




use common\models\CategoryAttributes;
use common\models\Values;

class CategoryHelper
{

    public static function getAllCategoryAttributesAndValues($category_id)
    {
        $allCategoryAttributesValues = CategoryAttributes::find()->where(['category_id' => $category_id])->with('attributes0')->asArray()->all();
        if (!empty($allCategoryAttributesValues)) {
            foreach ($allCategoryAttributesValues as &$categoryAttribute):
                $values = Values::find()->asArray()->where(['attributes_id' => $categoryAttribute['attributes0']['id']])->all();
                $categoryAttribute['attributeValue'] = $values;
            endforeach;
        }
        return $allCategoryAttributesValues;
    }





}