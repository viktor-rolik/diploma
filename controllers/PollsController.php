<?php

namespace app\controllers;

use Yii;
use app\models\Polls;

class PollsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id)
    {
    	$model = $this->findModel($id);

    }


    //  public function actionPoll()
    // {
    //     $model = new Poll();

    //     if ($model->load(Yii::$app->request->post())) {
    //         if ($model->validate()) {
    //         // делаем что-то, если форма прошла валидацию
    //            // return;
    //         }
    //         if($model->save()){
    //             Yii::$app->session->setFlash('success','Збережено');
    //             return $this->refresh();
    //         }else {
    //             Yii::$app->session->setFlash('error','Помилка збереження');
    //         }
    //     }

    //     return $this->render('poll', [
    //         'model' => $model,
    //     ]);
    // }
    public function actionPolls()
    {
    	$model = new Polls();

    	if ($model->load(Yii::$app->request->post())) {
    		if ($model->validate()) {
            // делаем что-то, если форма прошла валидацию
               // return;
    		}
    		if($model->save()){
    			Yii::$app->session->setFlash('success','Збережено');
    			return $this->refresh();
    		}else {
    			Yii::$app->session->setFlash('error','Помилка збереження');
    		}
    	}

    	return $this->render('polls', [
    		'model' => $model,
    	]);
    }
}