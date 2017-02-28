<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pinjaman */

$this->title = "Pinjam buku ".$buku->nama . " ". $buku->tahun;
$this->params['breadcrumbs'][] = ['label' => 'Pinjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pinjaman-view rows">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $teks ?>

</div>
