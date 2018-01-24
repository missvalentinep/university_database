<?php

namespace app\controllers;

use app\models\Activity;
use app\models\Department;
use app\models\PublishedWork;
use Yii;
use app\models\Employee;
use app\models\search\EmployeeSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->getIdentity()->is_admin == 0){
            $this->redirect('/site/index');
        }
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->getIdentity()->username != $id){
            $this->redirect('/site/index');
        }

        $employeeActivity = Activity::find()
            ->select('activity.activity_id, activity.comment, activity.start_date, activity.end_date')
            ->leftJoin('employee_activity', '`employee_activity`.`activity_id` = `activity`.`activity_id`')
            ->where(['employee_activity.employee_id'=>Yii::$app->user->identity->username]);

        $dataProvider = new ActiveDataProvider(['query' => $employeeActivity]);

        $employeePublications = PublishedWork::find()
            ->select('published_work.publication_id, published_work.title, published_work.number_of_pages, published_work.date_published, published_work.comment')
            ->leftJoin('employee_published_work', '`employee_published_work`.`publication_id` = `published_work`.`publication_id`')
            ->where(['employee_published_work.employee_id'=>Yii::$app->user->identity->username]);
        $secondProvider = new ActiveDataProvider(['query' => $employeePublications]);
        //die(var_dump($employeeActivity));
        return $this->render('view', [
            'model' => $this->findModel($id),
            'employeeActivity' => $dataProvider,
            'employeePublications' => $secondProvider,

        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->employee_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->getIdentity()->username != $id){
            $this->redirect('/site/index');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->employee_id]);
        }



        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
