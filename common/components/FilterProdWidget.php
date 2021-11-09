<?php


namespace common\components;

use common\models\FilterProduct;
use common\models\Product;
use common\models\ProductValues;
use common\models\Values;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;


class FilterProdWidget extends Widget
{

    public $tpl;
    public $url;
    public $category_id; // категория товаров
    public $modelsValuesIds;
    public $category_all_child;
    public $categoryAttributes;

    public function init()
    {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'filter';
        }

    }

    public function run()
    {
        $category_id = $this->url[1]['id'];
        $category_all_child = $this->category_all_child;

        $ids = [];
        $ids[] = $category_id;

        if (!empty($category_all_child)) {
            foreach ($category_all_child as $child) {
                $ids[] = $child['id'];
            }
        }

        //минимальная цена
        $min_price = Product::find()->where(['category_id' => $ids])->min('price');

        // максимальная цена
        $max_price = Product::find()->where(['category_id' => $ids])->max('price');

        //вытаскиваем все свойства
//        $product_values = ProductValues::find()->with('values')->all();
//        $attribute_values = Values::find()->with('attributes0')->all();

        $categoryAttributes = $this->categoryAttributes;
        $modelsValuesIds = $this->modelsValuesIds;

        $url = Yii::$app->request->resolve();
        $url = $url[1];
//        unset($url['id']);

        $model = new FilterProduct();

        $arrayParams = [];
        foreach ($url as $key => $value){
            if($key == 'FilterProduct') {
                $arrayParams = $value;
            }
        }

        //Наполняем модель из урла
        foreach ($arrayParams as $key => $value) {
            if($key == 'attributeValue'){
                $model->attributeValue = $value;
            }
            if($key == 'range'){
                $model->range = $value;
            }
            if($key == 'hid'){
                $model->sort = $value;
                $model->hid = $value;
            }
        }

//        debug($model);

        return $this->render($this->tpl, compact('modelsValuesIds', 'min_price', 'max_price', 'model', 'product_values', 'categoryAttributes', 'category_id', 'url'));
    }

}