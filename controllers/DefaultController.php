<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Defaults;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //$id_film = Yii::$app->request->get('id');

        $query = Defaults::find();
        $pagination = new Pagination([
            'defaultPageSize' => 15,
            'totalCount' => $query->count(),
        ]);

        $query = $query->orderBy('id_buku')
      ->offset($pagination->offset)
      ->limit($pagination->limit)
      ->all();

        return $this->render('index', [
        'query' => $query,
        'pagination' => $pagination,
        ]);

    }

    public function getDetail() {

        return "adsa";
    }

}
