<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-info']) ?>
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

//                    'id',
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['style' => 'width:5%'],
                    ],
                    [
                        'attribute' => 'user_id',
                        'headerOptions' => ['style' => 'width:7%'],
                    ],
                    'name',
                    'email',
                    'address',
                    'comment',
                    'summa',
                    [
                        'attribute' => 'status',
                        'headerOptions' => ['style' => 'width:5%'],
                        'value' => function($data){
                            return $data->status ? '<span class="text-green">Завершен</span>' : '<span class="text-red">Новый</span>';
                        },
                        'format' => 'html',
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => 'datetime',
                    ],
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
