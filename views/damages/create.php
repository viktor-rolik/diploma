<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Damages */

$this->title = 'Нове повідомлення';
$this->params['breadcrumbs'][] = ['label' => 'Пошкодження', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="damages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
