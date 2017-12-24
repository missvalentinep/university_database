<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
/* @var $departments array */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::className(), [

        // modify template for custom rendering

        'language' => 'ru',
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [

            'autoclose' => true,

            'format' => 'yyyy-mm-dd',
        ]
    ]) ?>

    <?= $form->field($model, 'graduation_information')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'science_degree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'academic_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_of_work')->widget(DatePicker::className(),[
        'language' => 'ru',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ]
    ])  ?>


    <?= $form->field($model, 'last_advanced_training')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->dropDownList($model->getDepartments()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
