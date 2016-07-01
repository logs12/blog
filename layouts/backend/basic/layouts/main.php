<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

/*
if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.

    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
*/

    //app\modules\admin\assets\AppAsset::register($this);
    app\modules\admin\assets\AdminLteAsset::register($this);
    //modules\main\MainAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            '@app/layouts/backend/basic/common/header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            '@app/layouts/backend/basic/common/left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            '@app/layouts/backend/basic/common/content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php //} ?>
