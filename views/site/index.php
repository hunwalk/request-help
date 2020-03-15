<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::$app->name;

?>

<?php if ($dataProvider): ?>
    <h2 class="main-title-question"><?= Yii::t('app', 'My requests') ?></h2>
<?= GridView::widget([
    'layout' => '{items}',
    'dataProvider' => $dataProvider,
    'columns' => [
        //'id',
        //'type',
        //'full_name',
        'first_name',
        //'last_name',
        'email:email',
        //'phone',
        //'country',
        'city',
        //'address',
        //'message_1:ntext',
        //'message_2:ntext',
        //'message_3:ntext',
        //'message_4:ntext',
        //'status',
        //'access_key',
        //'uid',
        'created_at',
        //'updated_at',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{finish} {update} {view} {delete}',
            'controller' => 'request',
            'buttons' => [
                'finish' => function ($url, $model, $key) {
                    $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-check"]);
                    return $model->status !== \app\records\Request::STATUS_DONE ? Html::a($icon, $url) : '';
                },
            ],
        ],
    ],
]); ?>
<?php endif; ?>

<div class="request-container">
    <h2 class="main-title-question"><?= Yii::t('app', 'How can we help?') ?></h2>

    <div class="request-options">
        <a href="/request/create?type=grocery" class="request-card">
            <img class="request-card-image" src="/images/grocery-store.png" alt="">
            <div class="request-card-footer">
                <h3 class="request-card-title"><?= Yii::t('app','Help me buying stuff')?></h3>
            </div>
        </a>
    </div>
</div>

<hr>

<h3 class="sub-title-question"><?= Yii::t('app', 'Do you want to help?') ?></h3>
<a class="request-list-link" href="/request/index"><?= Yii::t('app', 'Click here to see the help requests') ?></a>

<br><br><br>

