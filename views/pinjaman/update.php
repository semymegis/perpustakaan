<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pinjaman */

$this->title = 'Update Pinjaman: ' . $model->id_pinjaman;
$this->params['breadcrumbs'][] = ['label' => 'Pinjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pinjaman, 'url' => ['view', 'id' => $model->id_pinjaman]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pinjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
