<?php

namespace backend\controllers;

use backend\components\behaviors\DeleteCacheBehavior;
use common\models\Attributes;
use common\models\Category;
use common\models\CategoryAttributes;
use common\models\CategorySearch;
use backend\components\AppAdminController;
use common\models\helpers\CategoryHelper;
use common\models\Product;
use common\models\Values;
use Yii;
use yii\caching\TagDependency;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends AppAdminController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'DeleteCacheBehavior' => [
                    'class' => DeleteCacheBehavior::class,
                    'cacheTag' => 'category',
                    'actions' => ['create', 'update', 'delete'],
                ],
            ]
        );
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $allAttributes = ArrayHelper::map(Attributes::find()->asArray()->all(), 'id', 'title');

        $model = new Category();

        $post_data = Yii::$app->request->post('Category');


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if (isset($post_data['oneCategoryAttributes']))
            {
                // need to change category attributes
                CategoryHelper::changeCategoryAttributes($model->id, $post_data['oneCategoryAttributes']);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'allAttributes' => $allAttributes,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $allAttributes = ArrayHelper::map(Attributes::find()->asArray()->all(), 'id', 'title');

        $post_data = Yii::$app->request->post('Category');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if (isset($post_data['oneCategoryAttributes']))
            {
                // need to change category attributes
                CategoryHelper::changeCategoryAttributes($id, $post_data['oneCategoryAttributes']);
            }

//            TagDependency::invalidate(Yii::$app->cache, 'category');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if(!$model->save()) {
            print_r($model->errors);
        }

        $model->oneCategoryAttributes = CategoryHelper::getCategoryAttributesIds($id);

        return $this->render('update', [
            'model' => $model,
            'allAttributes'=> $allAttributes,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $cats = Category::find()->where(['parent_id' => $id])->count();
        $prods = Product::find()->where(['category_id' => $id])->count();
        if ($cats || $prods) {
            \Yii::$app->session->setFlash('error', '???????????????? ???????????????????? - ???????????????? ?????????????????? ?????????????????? ' . $cats . ' ??????/?? ?????????????????? ?????????????? ' . $prods);
        } else {
            \Yii::$app->session->setFlash('success', '?????????????????? ?????????????? ??????????????!');
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
