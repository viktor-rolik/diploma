<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Poll;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Poll */
/* @var $form ActiveForm */
?>
<div class="site-poll">
<h1><?= 'Опрос' ?></h1>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name') ?>
       

         <?= $form->field($model, 'astronauts')->radioList(
        	['Не использую этот источник',
        	 'Редко (реже 1 раза в месяц)', 
        	 'Иногда (2-3 раза в месяц)',
        	 'Часто (1-2 раза в неделю)',
        	 'Получаю информацию только из этого источника'
        	]
        )->label('С внутреннего портала') ?>

         <?= $form->field($model, 'planet')->radioList(
         	['Не использую этот источник',
         	'Редко (реже 1 раза в месяц)', 
         	'Иногда (2-3 раза в месяц)',
         	'Часто (1-2 раза в неделю)',
         	'Получаю информацию только из этого источника'
         ]
        )->label('Из Вайбера, на канале ДТЭК Сети') ?>
     
    
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

<?php
    $form = ActiveForm::begin();
// получаем всех авторов
    $name = Poll::find()->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
    $items = ArrayHelper::map($name,'id','name');
    // $params = [
    //     'prompt' => 'Укажите автора записи'
    // ];
    echo $form->field($model, 'planets')->radioList($items);

    ActiveForm::end();
?>
</div><!-- site-poll -->