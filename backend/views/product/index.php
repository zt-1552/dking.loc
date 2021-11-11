<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
//                    'content:raw',
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
                        'template' => '{view} {update} {delete} {clone}',
                        'buttons' => [
                            'clone' => function ($url, $model, $key) {

                                //Текст в title ссылки, что виден при наведении
                                $title = \Yii::t('yii', 'clone');

                                $options = [
                                    'title' => $title,
                                    'aria-label' => $title,
                                    'data-pjax' => '0',
                                ];

                                $url = Url::current(['create', 'cloneModel' => $key]);

                                //Для стилизации используем библиотеку иконок
                                $icon = Html::tag('span', '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="20px" height="20px">    <path d="M12,2C6.477,2,2,6.477,2,12s4.477,10,10,10s10-4.477,10-10S17.523,2,12,2z M16,13h-3v3c0,0.552-0.448,1-1,1h0 c-0.552,0-1-0.448-1-1v-3H8c-0.552,0-1-0.448-1-1v0c0-0.552,0.448-1,1-1h3V8c0-0.552,0.448-1,1-1h0c0.552,0,1,0.448,1,1v3h3 c0.552,0,1,0.448,1,1v0C17,12.552,16.552,13,16,13z"/></svg>', ['class' => "glyphicon glyphicon-plus"]);

                                return Html::a($icon, $url, $options);
                            },
                        ],
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
