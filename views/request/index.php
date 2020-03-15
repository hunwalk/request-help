<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\records\search\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Requests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                'template' => '{view}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
