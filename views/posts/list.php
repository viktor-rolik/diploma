<?php

use yii\grid\GridView;

$this->title = 'test gridview';

?>
<h1>Posts</h1>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Обычные поля определенные данными содержащимися в $dataProvider.
        // Будут использованы данные из полей модели.
        'name',
        'city',
    ],
]);
?>
