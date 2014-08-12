<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\Models\ResultsSearch $searchModel
 */

$this->title = 'Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="results-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Results', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'num',
            'count',
            'id_exp',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view} {delete}'],
        ],
    ]); ?>

</div>
