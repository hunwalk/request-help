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

<div class="top-container">
    <div class="language-container">
        <span class="top-container-title"><?= Yii::t('app', 'Language') ?></span>
        <div class="language-selector-container">

            <a href="#!" class="language-selector <?= Yii::$app->language === 'sk' ? 'selected' : ''?>"><?= Yii::t('app', 'Slovak')?></a>
            <a href="#!" class="language-selector <?= Yii::$app->language === 'hu' ? 'selected' : ''?>"><?= Yii::t('app', 'Hungarian')?></a>
        </div>
    </div>

</div>


<div class="container">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
