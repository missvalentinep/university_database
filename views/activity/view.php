<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->comment;
$this->params['breadcrumbs'][] = ['label' => 'Организационная деятельность', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'comment',
            'start_date',
            'end_date',
            'supporting_documents',
            'type',

        ],
    ]) ?>

</div>
