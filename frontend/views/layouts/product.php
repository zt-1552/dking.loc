<?php

use frontend\assets\OneProductAppAsset;
use yii\helpers\Html;


OneProductAppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <base href="/">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]); ?>

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="super_container">

    <?= $this->render('/layouts/inc/header')?>

    <?= $content ?>

    <?= $this->render('/layouts/inc/footer')?>

</div>

</body>
<?php $this->endBody() ?>


</html>
<?php $this->endPage() ?>

