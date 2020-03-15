<?php

namespace app\controllers;

use Ramsey\Uuid\Uuid;
use Throwable;
use Yii;
use app\records\Request;
use app\records\search\RequestSearch;
use yii\base\Exception;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestController implements the CRUD actions for Request model.
 */
class RequestController extends Controller
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
     * Lists all Request models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Request model.
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
     * Creates a new Request model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param string $type
     * @return mixed
     * @throws Exception
     */
    public function actionCreate($type = 'normal')
    {
        $model = new Request();
        $model->type = $type;
        $model->status = Request::STATUS_ACTIVE;

        if ($model->load(Yii::$app->request->post())) {

            if (!$model->access_key) {
                $cookies = Yii::$app->request->cookies;
                $access_key = $cookies->getValue('RH_ACCESS_KEY', Yii::$app->security->generateRandomString());
                $model->access_key = $access_key;
            }

            if (!$model->uid)
                $model->uid = \Faker\Provider\Uuid::uuid();

            if ($model->save()) {
                $cookies = Yii::$app->response->cookies;

                $cookies->add(new Cookie([
                    'name' => 'RH_ACCESS_KEY',
                    'value' => $model->access_key,
                ]));

                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Request model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException if the access key in the cookie differs
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $cookies = Yii::$app->request->cookies;
        $access_key = $cookies->getValue('RH_ACCESS_KEY', null);
        if ($model->access_key !== $access_key)
            throw new ForbiddenHttpException(Yii::t('app', 'You don`t have access to edit this item'));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Request model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $cookies = Yii::$app->request->cookies;
        $access_key = $cookies->getValue('RH_ACCESS_KEY', null);
        if ($model->access_key === $access_key)
            $model->delete();

        return $this->redirect(['/site/index']);
    }

    public function actionFinish($id)
    {
        $model = $this->findModel($id);

        $cookies = Yii::$app->request->cookies;
        $access_key = $cookies->getValue('RH_ACCESS_KEY', null);
        if ($model->access_key === $access_key){
            $model->status = Request::STATUS_DONE;
            $model->save();
        }

        return $this->redirect(['/site/index']);
    }

    /**
     * Finds the Request model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Request the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Request::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
