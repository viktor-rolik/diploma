<?php

namespace app\controllers;

use Yii;
use app\models\Damages;
use app\models\DamagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * DamagesController implements the CRUD actions for Damages model.
 */
class DamagesController extends Controller
{
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
                        'roles' => ['operator', 'main_operator'],
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
        $searchModel = new DamagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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
        $model = new Damages();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success','Збережено');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error','Помилка збереження');
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
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error','Помилка збереження');
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
        if (($model = Damages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошена сторінка не існує.');
    }
}
