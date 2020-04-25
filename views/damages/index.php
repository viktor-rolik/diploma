<?php
use Yii;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DamagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пошкодження';
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
<div class="damages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('operator') || Yii::$app->user->can('main_operator')) { ?>
        <p>
            <?= Html::a('Нове повідомлення', ['create'], ['class' => 'btn btn-success']) ?>
            <?= ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name:ntext',
                    'city:ntext',
                    'damage_time',
                    'recovery_time',
                ],
            ]); 
            ?>
        </p>
    <?php } ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'name:ntext',
            'city:ntext',
            'damage_time',
            'recovery_time',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>$actionTemplate,
                'visible' => $canSeeActionColumn
            ],
        ],
    ]);
    ?>
</div>
