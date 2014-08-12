<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\Models\ExperimentSearch $searchModel
 */

$this->title = 'Experiments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experiment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Auto Experiment', ['createauto'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Manual Experiment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'time',
            'name',
            'bones_num',
             'throws',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view} {delete}'],
        ],
    ]); ?>

</div>
