<?php

namespace frontend\controllers;

use Yii;
use common\models\Fileupload;
use frontend\models\search\FileuploadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\search\FileuploadLogSearch;
/**
 * FileuploadController implements the CRUD actions for Fileupload model.
 */
class FileuploadController extends Controller
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
        ];
    }

    /**
     * Lists all Fileupload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileuploadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10];
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all deleted Fileupload models.
     * @return mixed
     */
    public function actionLog()
    {
        $searchModel = new FileuploadLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10];

        return $this->render('log', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fileupload model.
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
     * Creates a new Fileupload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fileupload();
        $model->is_deleted = Fileupload::STATUS_ACTIVE;

        if ($model->load(Yii::$app->request->post())) {
            // process uploaded file instance
            $file = $model->uploadFile();
            $model->name  = $model->uploadFileName();


            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($file !== false) {
                    $path = $model->getUploadedFile();
                    $file->saveAs($path);
                }

                Yii::$app->getSession()->setFlash('alert', [
                    'body' => \Yii::t('frontend', 'Successfully uploaded file.'),
                    'options' => ['class' => 'alert-success']
                ]);

                return $this->redirect(['index']);
            } else {

            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fileupload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes changes the status of an existing Fileupload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {   
        $model = $this->findModel($id);
        $model->is_deleted = Fileupload::STATUS_DELETED;

        Yii::$app->getSession()->setFlash('alert', [
            'body' => \Yii::t('frontend', 'successfully deleted file.'),
            'options' => ['class' => 'alert-success']
        ]);
        
        if ($model->save()) {
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Fileupload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fileupload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fileupload::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('frontend', 'The requested page does not exist.'));
    }
}
