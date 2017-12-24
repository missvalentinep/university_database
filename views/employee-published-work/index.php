<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\EmployeePublishedWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Published Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-published-work-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee Published Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'entry_id',
            'employee_id',
            'publication_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
