<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'name',
                    [
                        'attribute' => 'parent_id',
                        'value' => function($data){
                            return $data->category->name ?? 'Корневая категория';
                        }
                    ],
                    'meta_title',
                    'meta_description:ntext',
                    //'content:ntext',
                    //'short_content:ntext',
                    //'image',
                    //'status',
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width:7%'],
                        'header' => 'Действия',
                    ],
                ],
                'pager' => [
                    'maxButtonCount' => 5, // максимум 5 кнопок
                    'options' => ['class' => 'pagination pagination-sm m-0 float-right'], // прикручиваем собственный дизайн не касаясь основного.
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                    'disabledPageCssClass' => ['class' => 'page-link'],
                ],
            ]); ?>
        </div>

    </div>

</div>
