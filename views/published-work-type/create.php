<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PublishedWorkType */

$this->title = 'Create Published Work Type';
$this->params['breadcrumbs'][] = ['label' => 'Published Work Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="published-work-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
