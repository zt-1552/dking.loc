<?php

use yii\helpers\Html;

?>
<body>

<div class="main-wrapper">
    <div class="error-area height-100vh" style="background-image:url(/assets/images/bg/error.png);">
        <div class="container-fluid p-0 height-100vh">
            <div class="row no-gutters align-items-center height-100vh">
                <div class="col-lg-12">
                    <div class="error-content text-center">
                        <h1><?= Html::encode($this->title) ?></h1>

                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>
                        <p>The above error occurred while the Web server was processing your request.</p>
                        <p>Please contact us if you think this is a server error. Thank you.</p>
                        <h3>Page Cannot Be Found!</h3>
                        <div class="error-btn btn-hover">
                            <a class="bg-black-hover" href="<?= \yii\helpers\Url::home() ?>">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

