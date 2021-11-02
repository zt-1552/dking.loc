<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Category Attributes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-attributes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category Attributes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
