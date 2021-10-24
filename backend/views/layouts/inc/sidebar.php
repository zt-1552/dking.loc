<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= \yii\helpers\Url::home() ?>" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item treeview">
                    <a href="#" class="nav-link">
<!--                        <i class="nav-icon fas fa-tachometer-alt"></i>-->
                        <p>
                            Заказы
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['/orders/index'])?>" class="nav-link">
                                <p>Управление заказами</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= \yii\helpers\Url::to(['/orders/create'])?>" class="nav-link">
                                <p>Добавить заказ</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/product/'])?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Товары
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
