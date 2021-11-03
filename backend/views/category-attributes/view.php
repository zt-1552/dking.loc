<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryAttributes */

$this->title = $model->category_id;
$this->params['breadcrumbs'][] = ['label' => 'Category Attributes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-attributes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'category_id' => $model->category_id, 'attributes_id' => $model->attributes_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'category_id' => $model->category_id, 'attributes_id' => $model->attributes_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'category_id',
                'value' => function($data) {
                    return $data->category->name;
                },
            ],
            'attributes_id',
            [
                'attribute' => 'attributes_id',
                'label' => 'Название атрибута',
                'value' => function($data) {
                    return $data->attributes0->title;
                },
            ],
        ],
    ]) ?>

</div>
