<?php

namespace app\controllers;

use Yii;
use yii\helpers\Json;
use app\models\Buku;
use app\models\Penerbit;
use app\models\Pinjaman;
use app\models\bukuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends Controller
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
     * Lists all Buku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new bukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Buku();

        $model->scenario = 'create';


        if ($model->load(Yii::$app->request->post())) {


                //$model->created = date();  // Added this.
                $waktu = time();
                $model->photo = \yii\web\UploadedFile::getInstance($model,'photo');
                if($model->validate()) {


                    $saveTo = 'uploads/'. $waktu. '.' . $model->photo->extension;
                    if($model->photo->saveAs($saveTo)) {

                        $model->photo = $waktu. '.' .$model->photo->extension;
                        $model->save();
                        return $this->redirect(['view', 'id' => $model->id_buku]);
                    } else {
                        return 'folder tidak ada';
                    }
                }else{
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

        } else {

            return $this->render('create', [
                'model' => $model,
            ]);

        }

    }

    public function actionPenerbit()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kategori = $parents[0];
                $out = Penerbit::find()->where(['id_kat' => $kategori])->select(['id','penerbit as name'])->asArray()->all();

                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id_buku]);
        // } else {
        //     return $this->render('update', [
        //         'model' => $model,
        //     ]);
        // }

        $lama = Buku::findOne($id);

        $waktu = time();
        if ($model->load(Yii::$app->request->post())) {

                $model->photo = \yii\web\UploadedFile::getInstance($model,'photo');
                if($model->validate()) {


                        if($model->photo) {
                            unlink("uploads/".$lama->photo);
                            $saveTo = 'uploads/'. $waktu. '.' . $model->photo->extension;
                            $model->photo->saveAs($saveTo);
                            $model->photo = $waktu. '.' .$model->photo->extension;
                            $model->save();
                            return $this->redirect(['view', 'id' => $id]);
                        }
                        else {
                            $model->photo = $lama->photo;
                            $model->save();
                            return $this->redirect(['view', 'id' => $id]);
                        }

                                        } else {
                                        return $this->render('update', [
                                            'model' => $model,
                                        ]);
                                    }

        } else {

            return $this->render('update', [
                'model' => $model,
            ]);

        }
    }

    /**
     * Deletes an existing Buku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $searchModel = new bukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        $model = Buku::findOne($id);
        $cek = Pinjaman::find()
        ->where(['id_buku' => $id])
        ->count();

        if($cek==0) { //kalo ga ada
            if(file_exists("uploads/".$model->photo)) {
                unlink("uploads/".$model->photo);
            }
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        else { // kalau ada yg pinjem
            return $this->redirect(['index?ket=Sedang dalam peminjaman']);
        }





        //


    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buku::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




}
