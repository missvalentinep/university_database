<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PublishedWork */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Печатные работы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="published-work-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'publication_id',
            'title',
            'number_of_pages',
            'number_of_authors',
            'date_published',
            'supporting_documents',
            'comment',
            'type_id',
        ],
    ]) ?>

</div>
