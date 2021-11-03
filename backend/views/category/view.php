<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Просмотр категории' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                    [
                        'attribute' => 'parent_id',
                        'value' => isset($model->category->name) ? '<a href="' . \yii\helpers\Url::to(['category/view', 'id' => $model->category->id]) . '">' . $model->category->name . '</a>' : 'Корневая категория',
                        'format' => 'raw',
                    ],
                    'name',
                    [
                            'attribute' => 'Фильтры/attributes',
                            'value' => function($model) {
                                    $attr = [];
                                    foreach ($model->attributes0 as $item) {
                    //                    debug($item);
                                        $attr[] = $item->title;
                                    }
                    //                debug($attr);
                                return implode(', ', $attr);
                            }
                    ],
                    'meta_title',
                    'meta_description:ntext',
                    'content:ntext',
                    'short_content:ntext',
                    'image',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>

        </div>

    </div>
</div>
