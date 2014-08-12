<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\Models\Experiment $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="experiment-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'date')->textInput(['readonly' => 'readonly']) ?>

    <?= $form->field($model, 'time')->textInput(['readonly' => 'readonly']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'bones_num')->textInput() ?>

    <?= $form->field($model, 'throws')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
