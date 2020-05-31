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
<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'last_update')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'name')->textInput(); ?>
    <?= $form->field($model, 'city')->textInput(); ?>
    <?= $form->field($model, 'address')->textInput(); ?>
    <?= $form->field($model, 'type_work')->textInput(); ?>
    <?= $form->field($model, 'start_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Оберіть дату та час ...'],
        'pluginOptions' => [
            'todayBtn' => true,
            'autoclose' => true
        ]
    ]); ?>
    <?= $form->field($model, 'final_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Оберіть дату та час ...'],
        'pluginOptions' => [
            'todayBtn' => true,
            'autoclose' => true
        ]
    ]); ?>
    <?= $form->field($model, 'phone')->textInput(); ?>
    <?= $form->field($model, 'email')->textInput(); ?>
    <?= $form->field($model, 'sum')->textInput(); ?>
    <?= $form->field($model, 'notes')->textarea(['rows' => 3]); ?>
    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
