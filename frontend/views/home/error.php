<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */


$this->title = $name;
?>
<body>

<div class="main-wrapper">
    <div class="error-area height-100vh" style="background-image:url(/assets/images/bg/error.png);">
        <div class="container-fluid p-0 height-100vh">
            <div class="row no-gutters align-items-center height-100vh">
                <div class="col-lg-12">
                    <div class="error-content text-center">
                        <h2><?= Html::encode($this->title) ?></h2>

                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>
                        <div class="error-btn btn-hover">
                             <a class="bg-black-hover" href="<?= \yii\helpers\Url::home() ?>">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>