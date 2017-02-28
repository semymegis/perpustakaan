<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Kategori;
use app\models\Penerbit;
use kartik\widgets\DepDrop;
use kartik\widgets\FileInput;



/* @var $this yii\web\View */
/* @var $model app\models\Buku */
/* @var $form yii\widgets\ActiveForm */

$listData = ArrayHelper::map(Kategori::find()->all(),'id','nama');
?>

<div class="buku-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>


               <?=  $form->field($model, 'id_kat')->dropDownList($listData , ['id'=>'id_kat', 'prompt'=>'Select Option']); ?>

               <?=  $form->field($model, 'id_penerbit')->widget(DepDrop::classname(), [
                'pluginOptions'=>[
                    'depends'=>['id_kat'],
                    'placeholder'=>'Select...',
                    'url'=>Url::to(['penerbit'])
                    ]
                ]);?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        ]);
    ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
