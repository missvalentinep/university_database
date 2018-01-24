<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PublishedWork */

$this->title = 'Изменить печатную работу';
$this->params['breadcrumbs'][] = ['label' => 'Печатные работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->publication_id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="published-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
