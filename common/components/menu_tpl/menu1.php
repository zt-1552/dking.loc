<?= (isset($category['children'])) ? '<li class="hassubs">' : '<li>'?>
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])?>"><?= $category['name'] ?><i class="fas fa-chevron-right"></i></a>
        <?php if (isset($category['children'])): ?>
            <ul>
                <?= $this->getMenuHtml($category['children']) ?>
            </ul>
        <?php endif; ?>
</li>


