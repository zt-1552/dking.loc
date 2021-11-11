<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Просмтор товара ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Клонировать', ['create', 'cloneModel' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
//                    'category_id',
                    'title',
                    [
                        'attribute' => 'category_id',
                        'value' => function($data) {
                            return $data->category->name;
                        },
                    ],
                    'content:raw',
                    'price',
                    'old_price',
                    'meta_title',
                    'meta_description',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        "value" => function($data){
                            return ($data->image) ? Html::img($data->image, ['width' => '100px']) : false;
                        }
                    ],
                    'is_offer',
                    'created_at',
                    'bestsellers',
                ],
            ]) ?>

        </div>
        <!-- /.card-body -->
    </div>


</div>
