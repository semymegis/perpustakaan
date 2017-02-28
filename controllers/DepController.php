<?php


namespace app\controllers;

use Yii;
use app\models\Dep;
use app\models\Buku;
use yii\web\Controller;
use app\models\Kategori;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class DepController extends Controller
{

    public  function actionIndex() {
        $model = new \yii\base\DynamicModel([
            'id_kat', 'id_buku', 'id_user'
        ]);
        $kat = Kategori::find()->all();

        return $this->render('/site/dep', [
            'model' => $model,
            'kat' => $kat
        ]);
    }

    public function actionGet()
    {
		$request = Yii::$app->request;
		$obj = $request->post('obj');
		$value = $request->post('value');

		switch ($obj) {
			case 'id_kat':
				$data = Buku::find()->where([$obj => $value])->all();
				break;
			case 'id_buku':
				$data = Pinjaman::find()->where([$obj => $value])->all();
				break;

		}

		$tagOptions = ['prompt' => "=== Select ==="];
		return Html::renderSelectOptions([], ArrayHelper::map($data, $obj, 'nama'), $tagOptions);
    }


}
