<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Организационная деятельность';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Выберите орг. деятельность из списка или добавьте новую</h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новую деятельность', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'comment',
            'type',
            'start_date',
            'end_date',
            //'supporting_documents',
            //'activity_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{update}{view}{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-plus"></span> <br>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },

                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span> <br>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },


                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                            'data-method' => 'POST',
                            'data-confirm' => 'Вы уверены, что хотите удалить эту деятельность?',
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
