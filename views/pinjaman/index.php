<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\pinjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Peminjaman anda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinjaman-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
             'attribute' => 'tgl',
             'format' => 'raw',

             'value' => function ($model) {
                     return  date('Y-F-d | h:i:s',$model->tgl);

                    },
            ],
            [
        	'attribute' => 'id_buku',
        	'value' => function($data) {
        		return $data->idBuku->nama;
        	}
            ],
            [
            'attribute' => 'tgl',
            'header' => 'Batas waktu',
            'value' => function($data) {
                $diff=strtotime("+3 days") - $data->tgl;
                $days=floor($diff/3600/24);
                $hours=floor(($diff-$days*3600*24)/3600);
                $mins=floor(($diff-$days*3600*24-$hours*3600)/60);
                $seconds=$diff-$days*3600*24-$hours*3600-$mins*60;
        		return $days." hari ".$hours." jam ".$mins." menit ". $seconds." detik lagi";
        	}
            ],

            [
            'header' => 'Photo',
            'attribute' => 'id_buku',
            'format' => 'raw',
            'value' => function ($data) {
                    return "<center><img src='uploads/".$data->idBuku->photo. "' class='img-thumbnail img-responsive' width='100' align='center' /> </center>";

                   },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
