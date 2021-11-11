<?php

namespace backend\controllers;

use common\models\helpers\CategoryHelper;
use common\models\helpers\ProductHelper;
use common\models\Product;
use common\models\ProductSearch;
use backend\components\AppAdminController;
use common\models\ProductValues;
use common\models\Values;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends AppAdminController
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
            ]
        );
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cloneModel = null)
    {
        if (!empty($cloneModel)){
            $oldModel = $this->findModel($cloneModel);
            $model = new Product();
            $model->setAttributes($oldModel->getAttributes());
            $modelsValuesIds = ProductHelper::getModelValuesIds($cloneModel);

        } else {
            $model = new Product();
            $modelsValuesIds = [];
        }

        $categoryAttributes = CategoryHelper::getAllCategoryAttributesAndValues(1);

        $post_data = Yii::$app->request->post('Product');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                if (isset($post_data['productValuesNew']))
                {
                    // need to change category attributes
                    ProductHelper::changeProductValues($model->id, $post_data['productValuesNew']);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelsValuesIds' => $modelsValuesIds,
            'categoryAttributes' => $categoryAttributes,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categoryAttributes = CategoryHelper::getAllCategoryAttributesAndValues($model->category_id);
        $modelsValuesIds = ProductHelper::getModelValuesIds($id);

        $post_data = Yii::$app->request->post('Product');
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if (isset($post_data['productValuesNew']))
            {
                // need to change category attributes
                ProductHelper::changeProductValues($id, $post_data['productValuesNew']);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelsValuesIds' => $modelsValuesIds,
            'categoryAttributes' => $categoryAttributes,
        ]);
    }

    /**
     * @return string
     */
    public function actionAjaxAttrValues()
    {
        $category_id = \Yii::$app->request->post('category_id');
        $categoryAttributes = CategoryHelper::getAllCategoryAttributesAndValues($category_id);

        if(\Yii::$app->request->isAjax) {
            return $this->renderAjax('ajax-attr-values', compact('category_id', 'categoryAttributes'));
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
