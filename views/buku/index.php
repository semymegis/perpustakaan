<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\bukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index rows">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  ?>
    <p>
        <?php echo Yii::$app->user->isGuest ? '' : ( Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']));?>
        <?php echo Yii::$app->user->isGuest ? '' : ( Html::a('Kategori Buku', ['../web/kategori'], ['class' => 'btn btn-primary']));?>
    </p>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_buku',
            'nama',
            'tahun',
            [
             'attribute' => 'photo',
             'format' => 'raw',

             'value' => function ($model) {
                     return "<center><img src='uploads/$model->photo' class='img-thumbnail img-responsive' width='100' align='center' /> </center>";

                    },
            ],
            [
        	'attribute' => 'id_kat',
        	'value' => function($data) {
        		return $data->kategori->nama;
        	}
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
