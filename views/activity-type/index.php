<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ActivityTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activity Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Activity Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type',
            'points',
            'type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
