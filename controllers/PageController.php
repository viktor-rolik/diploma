<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TestForm;

class PageController extends Controller {
   
    public function actionIndex() {
        // $model = new TestForm();
        // $model->name = 'Admin';
        // $model->city = 'New York';
        // $model->save();
    //    // var_dump($model->getErrors());
        return $this->render('index');
    }

    public function actionTest()
    {
        $model = new TestForm();
        // если пришли post-данные...
        if ($model->load(Yii::$app->request->post())) {
            // ...проверяем и сохраняем эти данные
            if ($model->save()) {
                // данные прошли валидацию, отмечаем этот факт
                Yii::$app->session->setFlash(
                    'success',
                    true
                );
                // перезагружаем страницу, чтобы избежать повтороной отправки формы
                return $this->refresh();
            } else {
                // данные не прошли валидацию, отмечаем этот факт
                Yii::$app->session->setFlash(
                    'success',
                    false
                );
                // не перезагружаем страницу, чтобы сохранить пользовательские данные
            }
        }
        return $this->render('test', ['model' => $model]);
    }
    
}