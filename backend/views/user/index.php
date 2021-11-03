<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email',
            'status',
            //'created_at',
            //'updated_at',
            //'verification_token',

//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => \yii\grid\ActionColumn::class,
//                'buttons'=>[
//                    'view'=>function ($url, $model) {
//                        $customurl=Yii::$app->getUrlManager()->createUrl(['log/view','id'=>$model['id']]); //$model->id для AR
//                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', $customurl,
//                            ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
//                    }
//                ],
                'template'=>'{view}  {delete}',
            ]
        ],
    ]); ?>


</div>
