<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Damages */
/* @var $form yii\widgets\ActiveForm */
?>
<div col="row">
<div class="col-sm-12 col-md-6">
<div class="thefts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'last_update')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'city')->textInput(); ?>
    <?= $form->field($model, 'stolen_property')->textInput(); ?>
    <?= $form->field($model, 'theft_detection_time')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Оберіть дату та час ...'],
        'pluginOptions' => [
            'todayBtn' => true,
            'autoclose' => true
        ]
    ]); ?>
    <?= $form->field($model, 'notes')->textInput(['rows' => 3]); ?>
    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
