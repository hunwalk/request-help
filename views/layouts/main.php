<?php

/* @var $this View */

/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="stylesheet" type="text/css" href="../../web/css/site.css"/>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" type="image/png" href="/favicon.png?v=1"/>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <a href="/" class="logo-container">
        <h1 class="page-title-logo"><?= Yii::$app->name ?></h1>
        <span class="page-subtitle-logo"><?= getenv('SITE_SUB_NAME')?></span>
    </a>
</div>

<div class="container">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
