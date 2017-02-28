<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Penerbit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penerbit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'penerbit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kat')->widget(kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(app\models\Kategori::find()->all(),'id','nama'),
        'options' => ['placeholder' => 'Pilih Kategori'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
