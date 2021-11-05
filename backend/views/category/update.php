<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Редактирование категории: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
        'allAttributes'=> $allAttributes,
    ]) ?>

        </div>
    </div>
</div>
