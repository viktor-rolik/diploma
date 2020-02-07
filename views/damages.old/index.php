<?php

use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

$this->title = 'test gridview';

?>
<h1>Damages</h1>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
 
        ['class' => 'yii\grid\SerialColumn'],
        // Обычные поля определенные данными содержащимися в $dataProvider.
        // // Будут использованы данные из полей модели.
        // 'name',
        // 'city',
        [
        	'attribute'=>'name',
        	'label'=>'Найменування обладнання',
        ],
         [
        	'attribute'=>'city',
        	'label'=>'Населений пункт',
        ],
        [
        	'attribute'=>'damage_time',
        	'label'=>'Час виявлення пошкодження',
        	'format'=>'datetime', // Доступные модификаторы - date:datetime:time
        	'headerOptions' => ['width' => '200'],
        ],
        [
        	'attribute'=>'recovery_time',
        	'label'=>'Час введення в роботу',
        	'format'=>'datetime', // Доступные модификаторы - date:datetime:time
        	'headerOptions' => ['width' => '200'],
        ],
        [
        	'attribute'=>'notes',
        	'label'=>'Примітки',
        ],

        ['class' => 'yii\grid\ActionColumn','header'=>'Действия', 
        'headerOptions' => ['width' => '80'],
        'template' => '{view} {update} {delete}{link}',
        'buttons' => [
                'update' => function ($url,$model) {
                    return Html::a(
                    '<span class="glyphicon glyphicon-screenshot"></span>', 
                    $url);
                },
            ],
    ],
    ],

]);
?>