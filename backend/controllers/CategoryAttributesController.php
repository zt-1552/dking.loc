<?php

namespace backend\controllers;

use common\models\CategoryAttributes;
use yii\data\ActiveDataProvider;
use backend\components\AppAdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryAttributesController implements the CRUD actions for CategoryAttributes model.
 */
class CategoryAttributesController extends AppAdminController
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
     * Lists all CategoryAttributes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CategoryAttributes::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'category_id' => SORT_DESC,
                    'attributes_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CategoryAttributes model.
     * @param int $category_id Category ID
     * @param int $attributes_id Attributes ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($category_id, $attributes_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($category_id, $attributes_id),
        ]);
    }

    /**
     * Creates a new CategoryAttributes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryAttributes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'category_id' => $model->category_id, 'attributes_id' => $model->attributes_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CategoryAttributes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $category_id Category ID
     * @param int $attributes_id Attributes ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($category_id, $attributes_id)
    {
        $model = $this->findModel($category_id, $attributes_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'category_id' => $model->category_id, 'attributes_id' => $model->attributes_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CategoryAttributes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $category_id Category ID
     * @param int $attributes_id Attributes ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($category_id, $attributes_id)
    {
        $this->findModel($category_id, $attributes_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CategoryAttributes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $category_id Category ID
     * @param int $attributes_id Attributes ID
     * @return CategoryAttributes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($category_id, $attributes_id)
    {
        if (($model = CategoryAttributes::findOne(['category_id' => $category_id, 'attributes_id' => $attributes_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
