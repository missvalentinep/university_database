<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PublishedWork */

$this->title = 'Добавить печатную работу';
$this->params['breadcrumbs'][] = ['label' => 'Печатные работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="published-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
