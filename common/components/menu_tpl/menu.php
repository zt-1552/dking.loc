<?= (isset($category['parent_id'])) ? '<li>' : '<li class="mega-menu-sub-width20">'?>
    <a class="<?= (isset($category['parent_id'])) ? '' : 'menu-title' ?>" href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])?>"><?= $category['name'] ?></a>
        <?php if (isset($category['children'])): ?>
            <ul>
                 <li><?= $this->getMenuHtml($category['children']) ?></li>
            </ul>
        <?php endif; ?>
</li>
