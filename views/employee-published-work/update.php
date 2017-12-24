<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeePublishedWork */

$this->title = 'Update Employee Published Work: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Employee Published Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->entry_id, 'url' => ['view', 'id' => $model->entry_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-published-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
