<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmployeePublishedWork */

$this->title = 'Create Employee Published Work';
$this->params['breadcrumbs'][] = ['label' => 'Employee Published Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-published-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
