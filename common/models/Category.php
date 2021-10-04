<?php

namespace common\models;

use common\models\base\Category as BaseCategory;

class Category extends BaseCategory
{


    /**
     * Возвращает массив идентификаторов всех потомков категории $id,
     * т.е. дочерние, дочерние дочерних и так далее
     */
    public function getAllChildIds($id) {
        $children = [];
        $ids = $this->getChildIds($id);
        foreach ($ids as $item) {
            $children[] = $item;
            $c = $this->getAllChildIds($item);
            foreach ($c as $v) {
                $children[] = $v;
            }
        }
        return $children;
    }

    /**
     * Возвращает массив идентификаторов дочерних категорий (прямых
     * потомков) категории с уникальным идентификатором $id
     */
    public function getChildIds($id) {
        $children = self::find()->where(['parent_id' => $id])->asArray()->all();
        $ids = [];
        foreach ($children as $child) {
            $ids[] = $child['id'];
//            debug($ids);
        }
        return $ids;
    }

}
