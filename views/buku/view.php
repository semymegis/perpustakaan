<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title = $model->id_buku;
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-view">

    <h1><?= Html::encode($model->nama) ?> <?= $model->tahun ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_buku], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_buku], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= Html::img('@web/uploads/'.$model->photo, [
        'class' => 'img img-thumbnail',
        'width' => '150',
        'style' => 'margin-bottom:10px'
    ]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'id_buku',
            'nama',
            'tahun',
            [
                'attribute' => 'id_kat',
                'value' => $model->kategori->nama,
            ]
        ],
    ]) ?>

</div>
