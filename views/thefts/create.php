<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Damages */

$this->title = 'Нове повідомлення';
$this->params['breadcrumbs'][] = ['label' => 'Викрадення', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="thefts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
