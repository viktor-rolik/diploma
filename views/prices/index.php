<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DamagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Розцінки';
$this->params['breadcrumbs'][] = $this->title;
$actionTemplate = '{view}';
$canSeeActionColumn = true;
?>
<?php 
if (Yii::$app->user->can('operator')){
    $actionTemplate = '{view} {update}';
    $canSeeActionColumn = true;
}elseif (Yii::$app->user->can('main_operator')){
    $actionTemplate = '{view} {update} {delete}';
    $canSeeActionColumn = true;
}elseif (Yii::$app->user->isGuest) {
    $actionTemplate = '';
    $canSeeActionColumn = false;
}
?>
<div class="prices-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if (Yii::$app->user->can('operator') || Yii::$app->user->can('main_operator')) { ?>
    <p>
        <?= Html::a('Додати нову розцінку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name_works:ntext',
            'units_measurement:ntext',
            'price:ntext',
            'notes:ntext',
            //'last_update',,
        ],
    ]); 
    ?> 
<?php } ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => ''],
        'filterModel' => $searchModel,
        'columns' => [ 
           //['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name_works:ntext',
            [
            'attribute' => 'units_measurement',
             'headerOptions' => ['style' => 'width:10%'],
            ],
            [
            'attribute' => 'price',
            'headerOptions' => ['style' => 'width:10%'],
            ],
            'notes:ntext',
            //'last_update',,
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>$actionTemplate,
                'visible' => $canSeeActionColumn
            ],
        ],
    ]);
    ?>
</div>
