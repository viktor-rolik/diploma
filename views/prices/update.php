<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Thefts */

$this->title = 'Редагувати запис: ' . $model->name_works;
$this->params['breadcrumbs'][] = ['label' => 'Розцінки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_works, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>


<div class="prices-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
