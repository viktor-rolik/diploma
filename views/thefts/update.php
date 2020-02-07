<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Thefts */

$this->title = 'Редагувати запис: ' . $model->city.'/'.$model->stolen_property;
$this->params['breadcrumbs'][] = ['label' => 'Викрадення', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city.'/'.$model->stolen_property , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>


<div class="thefts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
