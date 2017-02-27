<?php

namespace app\controllers;

use Yii;
use app\models\Pinjaman;
use app\models\Buku;
use app\models\pinjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PinjamanController implements the CRUD actions for Pinjaman model.
 */
class PinjamanController extends Controller
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
     * Lists all Pinjaman models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new pinjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->user->isGuest) {

            return $this->redirect('/web/user/login',302);
        }
        else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }






    }

    /**
     * Displays a single Pinjaman model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
            if(!Yii::$app->user->isGuest ) {
        $model = new Pinjaman();
        $date = strtotime("now");
        $user_id = Yii::$app->user->identity->id;
        $sql = Yii::$app->db->createCommand(sprintf("insert into pinjaman values($date,$id,DEFAULT,$user_id) "));

        $rows = (new \yii\db\Query())
        ->select(['id_buku', 'id_user'])
        ->from('pinjaman')
        ->where(['id_user' => $user_id , 'id_buku' => $id ])
        ->all();
        $buku = Buku::find()->where(['id_buku' => $id])->one();
        $count_val=count($rows);



        if($count_val==0) {
            $sql->execute();
            $status = "<div class='alert alert-success'>Berhasil</div>";
        } else {
            $status = "<div class='alert alert-danger'>Gagal, anda sudah pernah meminjam buku.</div>"  ;
        }

        return $this->render('view', [
            'model' => $model,
            'teks' => $status,
            'buku' => $buku,
        ]);

    } else {
        return $this->redirect(['index']);
    }
    }

    /**
     * Creates a new Pinjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pinjaman();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pinjaman]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pinjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pinjaman]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pinjaman model.
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
     * Finds the Pinjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pinjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pinjaman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
