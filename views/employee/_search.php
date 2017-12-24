<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'full_name') ?>

    <?= $form->field($model, 'occupation') ?>

    <?= $form->field($model, 'date_of_birth') ?>

    <?= $form->field($model, 'graduation_information') ?>

    <?php // echo $form->field($model, 'science_degree') ?>

    <?php // echo $form->field($model, 'academic_title') ?>

    <?php // echo $form->field($model, 'start_of_work') ?>

    <?php // echo $form->field($model, 'length_of_employment') ?>

    <?php // echo $form->field($model, 'last_advanced_training') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
