<?php

namespace app\Controllers;

use Yii;
use app\Models\Experiment;
use app\Models\ExperimentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExperimentController implements the CRUD actions for Experiment model.
 */
class ExperimentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Experiment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExperimentSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Experiment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new \app\Models\ResultsSearch;
        $dataProvider = $searchModel->search([
            'ResultsSearch' => ['id_exp' => $id]
        ]);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            
        ]);
    }

    /**
     * Creates a new Experiment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Experiment;
        
        //\yii\helpers\VarDumper::dump(Yii::$app->request->post());
        /*
        echo '<pre>';
        print_r($model);
        echo '</pre>';
         */
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionCreateauto()
    {
        $model = new Experiment;
        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);
    }
    
    /***
     This method was moved to the Experiment::_construct()
     * 
    private function GenerateExperimentData(){
        $model = new Experiment;
        $now = new \DateTime;
        $model->date = $now->format('Y-m-d');
        $model->time = $now->format('H:i:s');
        $model->name = "Experiment (from ".$model->date." ".$model->time.")";
        $model->bones_num = 2;
        $model->throws =36000;
        return $model;
    }
    */

    /**
     * Updates an existing Experiment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
     */

    /**
     * Deletes an existing Experiment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Experiment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Experiment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Experiment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
