<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $this->layout = 'category';

        $category = Category::findOne($id);

        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет....');
        }

        $this->setMeta("{$category->meta_title} :: " . \Yii::$app->name, $category->meta_description);

        // Breadcrumbs
        $breadcrumbs = [];
        $category_b = Category::find()->indexBy('id')->asArray()->all();
        array_unshift($breadcrumbs, $category_b[$category->id]);

        if($category->parent_id != 0) {

            $parent = $breadcrumbs;

            while ($parent[0]['parent_id'] != 0) {
                $parent[0] = $category_b[$parent[0]['parent_id']];
                array_unshift($breadcrumbs, $parent[0]);
            }
        }

        $main_categories = $this->getMainCategories();

        echo $main_categories;


        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('products', 'category', 'breadcrumbs', 'main_categories', 'pages'));

    }

    public function getMainCategories()
    {
        $data = \Yii::$app->cache->get('main_categories');
        if ($data === false) {
            $data = Category::find()->where(['parent_id' => null])->indexBy('id')->asArray()->all();

            \Yii::$app->cache->set('main_categories', $data, 30);
        }
        return $data;
    }


    public function actionSearch($query = '', $page = 1)
    {
        $page = (int)$page;

        // получаем результаты поиска с постраничной навигацией
        list($products, $pages) = (new Product())->getSearchResult($query, $page);

        // устанавливаем мета-теги для страницы
//        $this->setMetaTags('Поиск по каталогу');

        return $this->render(
            'search',
            compact('products', 'page')
        );

    }

}