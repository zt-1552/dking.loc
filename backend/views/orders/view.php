<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = 'Заказ №'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>


<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'id',
            'user_id',
            'name',
            'email',
            'address',
            'comment',
            'summa',
            [
                'attribute' => 'status',
                'value' =>  $model->status ? '<span class="text-green">Завершен</span>' : '<span class="text-red">Новый</span>',
                'format' => 'html',
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
</div>

</div>
</div>

<div class="card">
    <div class="card-header bg-teal">
        <h3 class="card-title">Товары в заказе</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $item): ?>

            <tr>
                <td><?= $item->product_id ?></td>
                <td><?= $item->product_name ?></td>
                <td><?= $item->quantity ?></td>
                <td><?= $item->price ?></td>
                <td><?= $item->price * $item->quantity ?></td>
            </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

