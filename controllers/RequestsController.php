<?php

namespace app\controllers;

use Yii;
use app\models\Requests;
use app\models\RequestsSearch;
use app\models\Notification;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class RequestsController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['index', 'view'],
                'rules' => [
                    // [
                    //     'allow' => true,
                    //     'actions' => ['index'],
                    //     'roles' => ['operator'],
                    // ],
                    // [
                    //     'allow' => true,
                    //     'actions' => ['view'],
                    //     'roles' => ['viewPost'],
                    // ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => [],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['operator', 'main_operator'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['main_operator'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Damages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->user->can('main_operator')){
            $main_operators = Yii::$app->authManager->getUserIdsByRole('main_operator');
            foreach ($main_operators as $user_id) {
                $notification = new Notification();
                $notification->type_id = Notification::TYPE_THEFT;
                $notification->user_id = $user_id;
                Notification::deleteAll('type_id = :type_id and user_id = :user_id', [':user_id' => $user_id, ':type_id' => Notification::TYPE_THEFT]);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Damages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Damages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Requests();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Збережено');
                $main_operators = Yii::$app->authManager->getUserIdsByRole('main_operator');
                foreach ($main_operators as $user_id) {
                    $notification = new Notification();
                    $notification->type_id = Notification::TYPE_THEFT;
                    $notification->user_id = $user_id;
                    $notification->save();
                }
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('success','Помилка збереження');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Damages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Збережено');
                $main_operators = Yii::$app->authManager->getUserIdsByRole('main_operator');
                foreach ($main_operators as $user_id) {
                    $notification = new Notification();
                    $notification->type_id = Notification::TYPE_THEFT;
                    $notification->user_id = $user_id;
                    $notification->save();
                }
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('success','Помилка збереження');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Damages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Damages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Damages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requests::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошена сторінка не існує.');
    }
    
}