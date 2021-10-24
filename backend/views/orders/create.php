<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */

$this->title = 'Создание заказа';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-create">

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form_create', [
                'model' => $model,
            ]) ?>
        </div>

    </div>

</div>
