<?php

use app\models\EmployeeActivity;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $dataProvider app\models\EmployeeActivity */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'employee_id',
            'full_name',
            'occupation',
            'date_of_birth',
            'graduation_information',
            'science_degree',
            'academic_title',
            'start_of_work',
            'length_of_employment',
            'last_advanced_training',
            'department',
        ],
    ]) ?>
    <?= Html::a('Обновить', ['update', 'id' => $model->employee_id], ['class' => 'btn btn-primary']) ?>

    <h1>Печатная деятельность</h1>

    <?= GridView::widget([
        'dataProvider' => $employeePublications,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'publication_id',
            'title',
            'number_of_pages',
            'date_published',
            'comment',


            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                            'data-method' => 'POST',
                            'data-confirm' => 'Вы уверены, что хотите удалить данную запись?',
                        ]);
                    }

                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = '/published-work/view?id='.$model->publication_id;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = '/published-work/update?id='.$model->publication_id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = '/published-work/delete?id='.$model->publication_id;
                        return $url;
                    }

                }
            ],
        ],
    ]); ?>




    <h1>Организационная деятельность</h1>
    <?= GridView::widget([
        'dataProvider' => $employeeActivity,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'comment',
            'start_date',
            'end_date',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                            'data-method' => 'POST',
                            'data-confirm' => 'Вы уверены, что хотите удалить данную запись?',
                        ]);
                    }

                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = '/activity/view?id='.$model->activity_id;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url = '/activity/update?id='.$model->activity_id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = '/activity/delete?id='.$model->activity_id;
                        return $url;
                    }

                }
            ],
        ],
    ]); ?>

</div>
