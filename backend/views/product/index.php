<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавть товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

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
                    //'meta_title',
                    //'meta_description',
//                    'image',
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        "value" => function($data){
                            return ($data->image) ? Html::img($data->image, ['width' => '50px']) : false;
                        }
                    ],

//                    'is_offer',
                    [
                        'attribute' => 'is_offer',
                        'headerOptions' => ['style' => 'width:5%'],
                        'value' => function($data){
                            return $data->is_offer ? '<span class="text-red">Sale</span>' : '';
                        },
                        'format' => 'html',
                    ],
                    //'created_at',
//                    'bestsellers',

                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width:7%'],
                        'header' => 'Действия',
                    ],
                ],
                'pager' => [
                    'maxButtonCount' => 5, // максимум 5 кнопок
                    'options' => ['class' => 'pagination pagination-sm m-0 float-right'], // прикручиваем свой id чтобы создать собственный дизайн не касаясь основного.
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                    'disabledPageCssClass' => ['class' => 'page-link'],
                ],
            ]); ?>

        </div>
        <!-- /.card-body -->
    </div>



</div>
