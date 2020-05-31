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
<div class="prices-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'last_update')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'name_works')->textInput(); ?>
    <?= $form->field($model, 'units_measurement')->textInput(); ?>
    <?= $form->field($model, 'price')->textInput(); ?>
    <?= $form->field($model, 'notes')->textarea(['rows' => 3]); ?>
    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
