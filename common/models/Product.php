<?php


namespace common\models;

use common\models\base\Product as baseProduct;
use Yii;
use yii\data\Pagination;

class Product extends baseProduct
{

    public function getSearchResult($search, $page) {
        $search = $this->cleanSearchString($search);
        if (empty($search)) {
            return [null, null];
        }

        // пробуем извлечь данные из кеша
        $key = 'search-'.md5($search).'-page-'.$page;
        $data = Yii::$app->cache->get($key);

        if ($data === false) {
            // данных нет в кеше, получаем их заново
            $query = self::find()->where(['like', 'name', $search]);
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
            Yii::$app->cache->set($key, $data, 600);
        }

        return $data;
    }

    /**
     * Вспомогательная функция, очищает строку поискового запроса с сайта
     * от всякого мусора
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



}