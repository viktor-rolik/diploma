<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Posts;
use yii\data\ActiveDataProvider;

class PostsController extends Controller {

    //...

    /**
     * Список записей
     */
    public function actionList() {
        $dataProvider = new ActiveDataProvider([
            'query' => Posts::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'paramA' => 10
        ]);
    }
}