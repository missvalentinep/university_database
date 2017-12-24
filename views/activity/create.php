<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = 'Добавить организационную деятельность';
$this->params['breadcrumbs'][] = ['label' => 'Организационная деятельность', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
