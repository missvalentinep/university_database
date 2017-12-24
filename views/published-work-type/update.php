<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PublishedWorkType */

$this->title = 'Update Published Work Type: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Published Work Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_id, 'url' => ['view', 'id' => $model->type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="published-work-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
