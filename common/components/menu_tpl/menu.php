



<?= (isset($category['children'])) ? '<li class="mega-menu-sub-width20">' : '<li>'?>
    <a class="
    <?= (isset($category['children'])) ? 'menu-title' : '' ?>
    " href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])?>"><?= $category['name'] ?></a>
        <?php if (isset($category['children'])): ?>
            <ul>
                 <li><?= $this->getMenuHtml($category['children']) ?></li>
            </ul>
        <?php endif; ?>

</li>
