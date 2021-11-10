<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Создание товара';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">


            <?= $this->render('_form', [
                'model' => $model,
                'modelsValuesIds' => $modelsValuesIds,
                'categoryAttributes' => $categoryAttributes,
            ]) ?>

        </div>
        <!-- /.card-body -->
    </div>

</div>
