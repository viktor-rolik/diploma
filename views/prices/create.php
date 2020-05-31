<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Damages */

$this->title = 'Додати нову розцінку';
$this->params['breadcrumbs'][] = ['label' => 'Розцінки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="prices-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
