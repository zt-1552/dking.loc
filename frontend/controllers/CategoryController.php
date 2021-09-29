<?php


namespace frontend\controllers;


use backend\components\AppController;
use common\models\Category;
use common\models\Product;
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

//debug($category);

        $breadcrumbs = [];
        $category_b = Category::find()->indexBy('id')->asArray()->all();
        array_unshift($breadcrumbs, $category_b[$category->id]);

        if($category->parent_id != 0) {

            $parent = $breadcrumbs;

            while ($parent[0]['parent_id'] != 0) {
                $parent[0] = $category_b[$parent[0]['parent_id']];
                array_unshift($breadcrumbs, $parent[0]);
//                debug($parent);
            }
        }

        $main_categories = [];
        foreach ($category_b as $category_m):
            if($category_m['parent_id'] == null) {
//                print_r($category_m);
                array_push($main_categories, $category_m);
            }
        endforeach;






//        debug($main_categories);



        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('products', 'category', 'breadcrumbs', 'main_categories', 'pages'));

    }

}