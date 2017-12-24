<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PublishedWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Печатные работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="published-work-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    <h4>Выберите печатную работу из списка или добавьте новую</h4>
        <?= Html::a('Добавить новую печатную работу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'publication_id',
            'title',
            'number_of_pages',
            'number_of_authors',
            'date_published',
            //'supporting_documents',
            'comment',
            //'type_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{update}{view}',
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


                }
            ],
        ],
    ]); ?>
</div>
