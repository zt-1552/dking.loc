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

    <div class="container">

        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                            <?php foreach ($main_categories as $main_category): ?>

                            <li><a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $main_category['id']]) ?>"><?= $main_category['name']; ?></a></li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            <li class="brand"><a href="#">Apple</a></li>
                            <li class="brand"><a href="#">Beoplay</a></li>
                            <li class="brand"><a href="#">Google</a></li>
                            <li class="brand"><a href="#">Meizu</a></li>
                            <li class="brand"><a href="#">OnePlus</a></li>
                            <li class="brand"><a href="#">Samsung</a></li>
                            <li class="brand"><a href="#">Sony</a></li>
                            <li class="brand"><a href="#">Xiaomi</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->



                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span><?= count($products)?></span> товаров найдено</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
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
                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                                <?= ($product->is_offer === 1) ? '<li class="product_mark product_discount">Sale</li>' : ''; ?>
<!--                                <li class="product_mark product_new">new</li>-->
                            </ul>
                        </div>

                            <?php  endforeach; ?>
                        <?php else: ?>
                            <h2>Поиск не нашел товаров....</h2>
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


