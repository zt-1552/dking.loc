<div class="sidebar_section">
    <?php foreach ($categoryAttributes as $categoryAttribute):?>
    <div class="sidebar_subtitle brands_subtitle"><?= $categoryAttribute['attributes0']['title'] ?></div>
    <ul class="brands_list">
        <?php foreach ($categoryAttribute['attributeValue'] as $attributeValue):?>
        <li class="brand" data-id="<?= $attributeValue['id'] ?>" data-slug="<?= $attributeValue['slug'] ?>"><a href=""><?= $attributeValue['value'] ?></a></li>
        <?php endforeach;  ?>
    </ul>
    <?php endforeach;  ?>
</div>