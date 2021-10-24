<?php

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

                    <?php if (!empty($categoryAttributes)) {?>
                        <?= $this->render('filter', compact('categoryAttributes')); ?>
                    <?php } ?>

                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->



                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span><?= $pages->totalCount; ?></span> товаров найдено, показано <?= count($products)?></div>
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
                        <?php  foreach ($products as $product): ?>

                        <!-- Product Item -->
                        <div class="product_item is_new">
                            <div class="product_border"></div>
                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><?= \yii\helpers\Html::img("{$product->image}", ['alt' => $product->title]) ?></div>
                            <div class="product_content">
                                <div class="product_price">$<?= $product->price ?></div>
                                <div class="product_name"><div><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>" tabindex="0"><?= $product->title ?></a></div></div>
                            </div>
                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id ?>" class="add_to_cart btn btn-light btn-sm">Купить</a>
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                                <?= ($product->is_offer === 1) ? '<li class="product_mark product_discount">Sale</li>' : ''; ?>
<!--                                <li class="product_mark product_new">new</li>-->
                            </ul>
                        </div>

                            <?php  endforeach; ?>
                        <?php else: ?>
                            <h3>Здесь пока нету товаров....</h3>
                        <?php endif; ?>


                    </div>

                    <!-- Shop Page Navigation -->
                    <div class="shop_page_nav d-flex flex-row">
<!--                        <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>-->
                        <?= \yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                            'options' => [
                                'tag' => 'ul',
                                'class' => 'page_nav d-flex flex-row',
                            ],
                        ])?>
<!--                        <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>-->
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>


