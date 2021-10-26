<?php


namespace common\models;


class FilterProduct extends \yii\base\Model
{

    public $propertyValue = [];
    public $range;
    public $sort;
    public $hid;

    const HIT = 1;
    const NO_HIT = -1;
    const SALE = 2;
    const NO_SALE = -2;
    const PRICE = 3;
    const NO_PRICE = -3;

    public function rules()
    {
        return [
            ['propertyValue', function($attribute, $params, $validator){
                if(!is_array($attribute)){
                    $this->addError($attribute, 'Что-то пошло не так');
                }
            }],
            [['range', 'sort', 'hid'], 'safe'],
            ['sort', 'integer'],
        ];
    }

    public static function getTypes()
    {
        return [
            self::HIT => 'Самые популярные',
            self::SALE => 'Распродажа',
            self::PRICE => 'Цена дешевле',
            self::NO_PRICE => 'Цена дороже',
        ];
    }

}