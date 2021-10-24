<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = 'Редактирование заказа №: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Заказ №'. $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

            </div>

    </div>

</div>
