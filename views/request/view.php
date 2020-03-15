<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\records\Request */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <br><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'email:email',
            'phone',
            'city',
            'address',
            'message_1:ntext',
            'created_at',
        ],
    ]) ?>

</div>
