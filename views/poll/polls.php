<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Polls;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Poll */
/* @var $form ActiveForm */
?>
<div class="site-poll">
<h1><?= 'Опрос' ?></h1>
    <?php $form = ActiveForm::begin(); 

 $subject = Polls::find()->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
    $items = ArrayHelper::map($subject,'id','subject');
    // $params = [
    //     'prompt' => 'Укажите автора записи'
    // ];
    echo $form->field($model, 'vote_count')->radioList($items);
    ?>
        
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div><!-- site-poll -->