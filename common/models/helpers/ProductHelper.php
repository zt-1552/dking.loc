<?php


namespace common\models\helpers;


use common\models\ProductValues;
use yii\helpers\ArrayHelper;

class ProductHelper
{

    public static function changeProductValues($product_id, $productValuesNew = '')
    {
        $old_values = ProductValues::find()->where(['product_id' => $product_id])->all();//1.5.9.12
        $new_values = explode(',', $productValuesNew);//5.10.14

        if (!empty($new_values)) {

            //delete all we don't need
            if (!empty($old_values)) {
                foreach ($old_values as $key => $old_value)
                    if (!in_array($old_value->values_id, $new_values))
                    {
                        $old_value->delete();
                        unset($old_values[$key]);
                    }
            }

            $oldValuesIds = ArrayHelper::getColumn($old_values, 'values_id') ?? [];//5

            foreach ($new_values as $item){
                if (!in_array($item, $oldValuesIds)){
                    $new_product_value = new ProductValues();
                    $new_product_value->product_id = $product_id;
                    $new_product_value->values_id = $item;
                    $new_product_value->save();
                }
            }
        } else {
            if (!empty($old_values)) {
                foreach ($old_values as $key => $old_value)
                {
                    $old_value->delete();
                }
            }
        }
    }


}