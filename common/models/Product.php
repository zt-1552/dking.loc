<?php


namespace common\models;

use common\models\base\ActiveRecord;
use common\models\base\Product as baseProduct;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\Expression;
use yii\web\UploadedFile;

class Product extends baseProduct
{

    public $file;


    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['file'], 'image'],
            ]
        );
    }

    public function attributeLabels()
    {

        return array_merge(
            parent::attributeLabels(),
            [
            'file' => 'Фото',
            ]);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }


    public function getSearchResult($search, $page) {
        $search = $this->cleanSearchString($search);
        if (empty($search)) {
            return [null, null];
        }

            // данных нет в кеше, получаем их заново
            $query = self::find()->where(['like', 'title', $search]);
            // постраничная навигация
            $pages = new Pagination([
                'totalCount' => $query->count(),
                'pageSize' => Yii::$app->params['pageSize'],
                'forcePageParam' => false,
                'pageSizeParam' => false
            ]);
            $products = $query
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->asArray()
                ->all();
            // сохраняем полученные данные в кеше
            $data = [$products, $pages];

        return $data;
    }

    /**
     * Вспомогательная функция, очищает строку поискового запроса с сайта
     * от мусора
     * @param $search
     * @return string
     */
    protected function cleanSearchString($search) {
        $search = iconv_substr($search, 0, 64);
        // удаляем все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // сжимаем двойные пробелы
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        return $search;
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'file')) {
//            var_dump($this);
             $dir = '/products/' . date("Y-m-d") . '/';
             $dir_temp = \Yii::getAlias("@frontend") . '/web' . $dir;
             if (!is_dir($dir_temp)) {
//                             var_dump($dir_temp); die;
                 mkdir($dir_temp);
             }
             $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
             $this->image = $dir . $file_name;
             $file->saveAs($dir_temp . $file_name);
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function beforeDelete()
    {
        $filename = $this->image;
        unlink(\Yii::getAlias("@frontend") . '/web' . $filename);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }


}