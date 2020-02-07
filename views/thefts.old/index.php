<?php

use yii\grid\GridView;

$this->title = 'test gridview';

?>
<h1>Theft</h1>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Обычные поля определенные данными содержащимися в $dataProvider.
        // Будут использованы данные из полей модели.
        // 'city',
        // 'stolen_property',
         [
        	'attribute'=>'city',
        	'label'=>'Населений пункт',
        ],
         [
        	'attribute'=>'stolen_property',
        	'label'=>'Викрадене обладнання (майно)',
        ],
        [
        	'attribute'=>'theft_detection_time',
        	'label'=>'Час виявлення крадіжки',
        	'format'=>'datetime', // Доступные модификаторы - date:datetime:time
        	'headerOptions' => ['width' => '200'],
        ],
         [
        	'attribute'=>'notes',
        	'label'=>'Примітки',
        ],
    ],
]);
?>
