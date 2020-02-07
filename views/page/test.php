<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\datetime\DateTimePicker;

$this->title = 'Додати пошкодження';
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?php if (Yii::$app->session->getFlash('success')): ?>
        <p>Данные формы прошли валидацию</p>
    <?php else: ?>
        <p>Данные формы не прошли валидацию</p>
    <?php endif; ?>
<?php endif; ?>

<div class="page-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'testform-form', 'options' => ['novalidate' => '']]); ?>
    <?= $form->field($model, 'name')->textInput(); ?>
    <?= $form->field($model, 'city')->textInput(); ?>
    
    <?= $form->field($model, 'damage_time')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Оберіть дату та час ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>
    <?= $form->field($model, 'recovery_time')->textInput(); ?>
    <?= $form->field($model, 'notes')->textInput(['rows' => 3]); ?>
    <?= Html::submitButton('Додати', ['class' => 'btn btn-primary']); ?>
    <?php ActiveForm::end(); ?>
</div>

