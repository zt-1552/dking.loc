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
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'user_id',
                    'name',
                    'email:email',
                    'address',
                    //'comment',
                    //'summa',
                    //'status',
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
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
