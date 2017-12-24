<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Изменить организационную деятельность';
$this->params['breadcrumbs'][] = ['label' => 'Организационная деятельность', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comment, 'url' => ['view', 'id' => $model->activity_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
