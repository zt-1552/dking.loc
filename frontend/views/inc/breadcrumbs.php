<?php
use yii\widgets\Breadcrumbs;
?>

<!-- breadcrumb YII2 Widget -->
<div class="container">

    <div class="bread">
        <?php echo Breadcrumbs::widget([
            'options' => [
                'class' => "breadcrumb",
            ],

            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
            'activeItemTemplate' => '<li class="breadcrumb-item active">{link}</li>',
            'tag' => 'ul',
            'encodeLabels' => false
        ]);
        ?>
    </div>
</div>

