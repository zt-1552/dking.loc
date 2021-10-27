<?php


namespace common\components;

use yii\base\Widget;


class FilterProdWidget extends Widget
{

    public $category_id; // категория товаров
    public $category_all_child;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $category = $this->category_id;

        $ids = [];
        $ids[] = $category['id'];

        if (!empty($child_all_category)) {
            foreach ($child_all_category as $child) {
                $ids[] = $child['id'];
            }
        }

        return $this->render('filter', compact('ids'));

    }

}