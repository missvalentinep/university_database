<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PublishedWork */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="published-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_pages')->textInput() ?>

    <?= $form->field($model, 'number_of_authors')->textInput() ?>

    <?= $form->field($model, 'date_published')->widget(DatePicker::className(),[
        'language' => 'ru',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ]
    ])  ?>

    <?= $form->field($model, 'supporting_documents')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->dropDownList($model->getTypes())?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
