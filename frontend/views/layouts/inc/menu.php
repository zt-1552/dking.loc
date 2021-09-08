
<div class="main-menu menu-lh-1 main-menu-padding-1 menu-mrg-1">
    <nav>
        <ul>
            <li><a href="<?= \yii\helpers\Url::home()?>">Home</a></li>
            <li><a href="shop.html">Shop</a>
                <ul class="mega-menu-style-1 mega-menu-width2 menu-negative-mrg2">
                    <?= \common\components\MenuWidget::widget([
                            'tpl' => 'menu',
                            'ul_class' => ''
                    ]) ?>
                </ul>
            </li>
            <li><a href="index.html#">Pages</a>
                <ul class="sub-menu-width">
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                    <li><a href="contact-us-2.html">Contact Us 2</a></li>
                    <li><a href="404.html">404 Page</a></li>
                </ul>
            </li>
            <li><a href="shop.html">Collections</a></li>
            <li><a href="blog.html">Blog</a>
                <ul class="sub-menu-width">
                    <li><a href="blog.html">Blog Page</a></li>
                    <li><a href="blog-no-sidebar.html">Blog No sidebar</a></li>
                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="contact-us.html">Contact</a></li>
        </ul>
    </nav>
</div>
