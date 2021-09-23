<?php
//debug($products);
?>

    <div class="shop-area pt-160 pb-160">
        <div class="container">
            <h1 style="text-align: center"><?= $category->name; ?></h1>
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="tab-content">
                        <div id="shop-categorie-2" class="tab-pane active">
                            <div class="shop-top-bar">
                                <div class="shop-top-bar-left">
                                    <div class="shop-tab nav">
                                        <?php foreach ($breadcrumbs as $breadcrumb):?>
<!--                                            <a href="#">--><?//= $breadcrumb->name ?><!--</a>-->
                                        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $breadcrumb['id']]) ?>"><h5><?= $breadcrumb['name'] ?> - </h5></a>
<!--                                        --><?//= debug($breadcrumb)?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-top-bar">
                                <div class="shop-top-bar-left">
                                    <div class="shop-tab nav">

                                    </div>
                                </div>
                                <div class="shop-top-bar-right">
                                    <div class="shop-page-list">
                                        <ul>
                                            <li>Show</li>
                                            <li class="active"><a href="shop.html#">2</a></li>
                                            <li><a href="shop.html#">4</a></li>
                                            <li><a href="shop.html#">6</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content pt-30">
                                <div id="shop-3" class="tab-pane active">
                                    <div class="row">
                                        <?php if(!empty($products)) : ?>
                                        <?php  foreach ($products as $product): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="product-wrap mb-50">
                                                <div class="product-img product-img-zoom mb-25">
                                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">
                                                        <?= \yii\helpers\Html::img("@web/assets/{$product->image}", ['alt' => $product->title]) ?>
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    <h4><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->title ?></a></h4>
                                                    <div class="product-price">
                                                        <span>$ <?= $product->price ?></span>
                                                        <span class="old-price">
                                                            <span class="old-price">$ <?= $product->old_price ?></span>
                                                    </div>
                                                </div>
                                                <div class="product-action-position-1 text-center">
                                                    <div class="product-content">
                                                        <h4><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->title ?></a></h4>
                                                        <div class="product-price">
                                                            <span>$ <?= $product->price ?></span>
                                                            <span class="old-price">$ <?= $product->old_price ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action-cart">
                                                            <button title="Add to Cart">Add to cart</button>
                                                        </div>
                                                        <button data-toggle="modal" data-target="#exampleModal"><i class="icon-zoom"></i></button>
                                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php  endforeach; ?>
                                        <?php else: ?>
                                        <h3>Здесь пока нету товаров....</h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="pro-pagination-style text-center mt-50">
                                    <ul>
                                        <li><a class="active" href="shop.html#">1</a></li>
                                        <li><a href="shop.html#">2</a></li>
                                        <li><a href="shop.html#"><i class="icofont-long-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar-style">
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Subcategories</h4>
                            <div class="sidebar-widget-categori mt-45 mb-70">
                                <ul>
                                    <li><a href="shop.html#">All</a> </li>
                                    <li><a class="active" href="shop.html#">Clothing</a> </li>
                                    <li><a href="shop.html#">Shoes</a> </li>
                                    <li><a href="shop.html#">Watches</a> </li>
                                    <li><a href="shop.html#">Jewelry</a> </li>
                                    <li><a href="shop.html#">Accessories</a> </li>
                                    <li><a href="shop.html#"> Big & Tall </a> </li>
                                    <li><a href="shop.html#">Contemporary</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Color</h4>
                            <div class="pro-details-color-content sidebar-widget-color mt-45 mb-70">
                                <ul>
                                    <li><a class="white" href="shop.html#">Black</a></li>
                                    <li><a class="azalea" href="shop.html#">Blue</a></li>
                                    <li><a class="dolly" href="shop.html#">Green</a></li>
                                    <li><a class="peach-orange" href="shop.html#">Orange</a></li>
                                    <li><a class="mona-lisa active" href="shop.html#">Pink</a></li>
                                    <li><a class="cupid" href="shop.html#">gray</a></li>
                                    <li><a class="one" href="shop.html#">one</a></li>
                                    <li><a class="two" href="shop.html#">two</a></li>
                                    <li><a class="three" href="shop.html#">three</a></li>
                                    <li><a class="four" href="shop.html#">four</a></li>
                                    <li><a class="five" href="shop.html#">five</a></li>
                                    <li><a class="six" href="shop.html#">six</a></li>
                                    <li><a class="seven" href="shop.html#">seven</a></li>
                                    <li><a class="eight" href="shop.html#">eight</a></li>
                                    <li><a class="nine" href="shop.html#">nine</a></li>
                                    <li><a class="ten" href="shop.html#">ten</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Size</h4>
                            <div class="sidebar-widget-size mt-50 mb-75">
                                <ul>
                                    <li><a href="shop.html#">XS</a> </li>
                                    <li><a href="shop.html#">S</a> </li>
                                    <li><a href="shop.html#">M</a> </li>
                                    <li><a href="shop.html#">L</a> </li>
                                    <li><a href="shop.html#">XL</a> </li>
                                    <li><a href="shop.html#">XXL</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Price Range</h4>
                            <div class="price-filter mt-55 mb-65">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <span>Price: </span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Filter By Brand</h4>
                            <div class="sidebar-widget-brand-logo mt-50">
                                <ul>
                                    <li><a href="shop.html#"><img src="assets/images/brand-logo/brand-logo-1.png" alt=""></a></li>
                                    <li><a href="shop.html#"><img src="assets/images/brand-logo/brand-logo-2.png" alt=""></a></li>
                                    <li><a href="shop.html#"><img src="assets/images/brand-logo/brand-logo-3.png" alt=""></a></li>
                                    <li><a href="shop.html#"><img src="assets/images/brand-logo/brand-logo-6.png" alt=""></a></li>
                                    <li><a href="shop.html#"><img src="assets/images/brand-logo/brand-logo-5.png" alt=""></a></li>
                                    <li><a href="shop.html#"><img src="assets/images/brand-logo/brand-logo-4.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
