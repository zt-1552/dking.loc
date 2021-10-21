<?php

use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

?>
<!-- Home -->

<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
    <div class="home_overlay"></div>
    <div class="home_content d-flex flex-column align-items-center justify-content-center">
        <h2 class="home_title"><?= $category->name; ?></h2>
    </div>
</div>


<!-- Shop -->

<div class="shop">

<?= $this->render('../inc/breadcrumbs')?>

    <div class="container">

        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="">
                    <?php if(!empty($child_categories)) {?>
                    <div class="sidebar_section">
                        <div class="sidebar_title">Подкатегории</div>
                        <ul class="sidebar_categories">
                            <?php foreach ($child_categories as $child_category): ?>
                                <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $child_category['id']]) ?>"><?= $child_category['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Фильтры</div>
                        <div class="sidebar_subtitle">Цена</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>

                    <div class="product-search">

                        <?php $form = ActiveForm::begin([
                            'action' => ['view'],
                            'method' => 'get',
                        ]); ?>

<!--                        --><?//= $form->field($searchModel, 'id') ?>

                        <?= $form->field($searchModel, 'category_id') ?>

                        <?= $form->field($searchModel, 'title') ?>

<!--                        --><?//= $form->field($searchModel, 'content') ?>

<!--                        --><?//= $form->field($searchModel, 'price') ?>

                        <?php // echo $form->field($model, 'old_price') ?>

                        <?php // echo $form->field($model, 'meta_title') ?>

                        <?php // echo $form->field($model, 'meta_description') ?>

                        <?php // echo $form->field($model, 'image') ?>

                        <?php // echo $form->field($model, 'is_offer') ?>

                        <?php // echo $form->field($model, 'created_at') ?>

                        <?php // echo $form->field($model, 'bestsellers') ?>

                        <div class="form-group">
                            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>

                    <?php if (!empty($categoryAttributes)) {?>
                        <?= $this->render('filter', compact('categoryAttributes')); ?>
                    <?php } ?>

                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
<!--                        <div class="shop_product_count"><span>--><?//= $pages->totalCount; ?><!--</span> товаров найдено, показано --><?//= count($products)?><!--</div>-->
                        <div class="shop_sorting">
                            <span>Сортировка:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">По умолчанию<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>По умолчанию</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>От А до Я</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>По возрастанию цены</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid">
                        <div class="product_grid_border"></div>

                        <?php if(!empty($products)) : ?>
                        <?php

                            echo ListView::widget([
                                'dataProvider' => $dataProvider,
                                'itemView' => '_list',
                            ]);
                            ?>

                        <?php else: ?>
                            <h3>Здесь пока нету товаров....</h3>
                        <?php endif; ?>


                    </div>

                    <!-- Shop Page Navigation -->
                    <div class="shop_page_nav d-flex flex-row">
                        <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
<!--                        --><?//= \yii\widgets\LinkPager::widget([
//                            'options' => [
//                                'tag' => 'ul',
//                                'class' => 'page_nav d-flex flex-row',
//                            ],
//                        ])?>
                        <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>


