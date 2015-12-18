<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'evaluacion-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); 

		echo $form->textFieldControlGroup($model,'tev_id',array('size'=>10,'maxlength'=>10)); 
		echo $form->textFieldControlGroup($model,'emp_rut',array('size'=>13,'maxlength'=>13)); 
		echo $form->numberFieldControlGroup($model,'tel_numero'); 
		echo $form->textFieldControlGroup($model,'usu_rut',array('size'=>13,'maxlength'=>13)); 
		echo $form->dateFieldControlGroup($model,'eva_fecha', array('value'=>date('Y-m-d'))); 
		echo $form->numberFieldControlGroup($model,'eva_numero',array('size'=>10,'maxlength'=>10)); 
		echo $form->dateFieldControlGroup($model,'eva_fecha_creacion', array('value'=>date('Y-m-d'))); 
		echo $form->textFieldControlGroup($model,'eva_desabilitado'); 
		echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); 

$this->endWidget(); ?>

</div><!-- form -->