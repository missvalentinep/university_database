<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\PublishedWorkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="published-work-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'publication_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'number_of_pages') ?>

    <?= $form->field($model, 'number_of_authors') ?>

    <?= $form->field($model, 'date_published') ?>

    <?php // echo $form->field($model, 'supporting_documents') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
