<?php


namespace common\models;

use common\models\base\ActiveRecord;
use common\models\base\Orders as BaseOrders;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class Orders extends BaseOrders
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


}