<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Notification;

$siteIndex = ['label' => 'Головна', 'url' => ['/site/index']];
$order = '';
$price = '';
$request = '';
$isNewTheft = false;
if (Yii::$app->user->can('operator') || Yii::$app->user->can('main_operator')) {
   if (Notification::find()->where(['type_id' => 1])->exists()) {
    $isNewTheft = true;
}
$siteIndex = '';
$order = ['label' => 'Замовлення', 'url' => ['/orders/index']];
$price = ['label' => 'Розцінки на роботи', 'url' => ['/prices/index']];
$request = ['label' => 'Заявки на ремонт', 'url' => ['/requests/index']];
}
if($isNewTheft) {
    Yii::$app->session->setFlash('info','Нова заявка');
}
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            $siteIndex,
            $order,
            $price,
            //['label' => 'Контакти', 'url' => ['/site/contact']],
            $request,
            //['label' => 'Реєстрація', 'url' => ['/site/signup']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вхід', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Вихід (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?=Yii::$app->name ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
