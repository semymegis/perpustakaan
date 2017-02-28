<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;


?>
<div class="form">

	<div class="page-header">
		<h1>Dependent Dropdown</h1>
	</div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kat')->dropDownList($kat, ['id'=>'id_kat']); ?>
    
    <?php ActiveForm::end(); ?>

</div><!-- form -->
