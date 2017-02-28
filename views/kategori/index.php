<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Buku;

/* @var $this yii\web\View */
/* @var $searchModel app\models\kategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategoris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Yii::$app->user->isGuest ? '' : ( Html::a('Create Buku', ['../web/buku'], ['class' => 'btn btn-warning']));?>
        <?= Html::a('Create Kategori', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            [
                'header' => 'Jumlah Buku',

                'attribute' => 'id',
                'value' => function($data) {
                    return Buku::find()->where(['id_kat' => $data->id])->count();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
