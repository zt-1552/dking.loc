<?php

namespace common\models;

use common\models\base\ActiveRecord;
use common\models\base\Category as BaseCategory;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Category extends BaseCategory
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }


    /**
     * Главные категории
     * @return array|mixed
     */
    public function getMainCategories()
    {
        $data = \Yii::$app->cache->get('main_categories');
        if ($data === false) {
            $data = Category::find()->where(['parent_id' => null])->indexBy('id')->asArray()->all();

            \Yii::$app->cache->set('main_categories', $data, 30);
        }
        return $data;
    }


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

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }



}
