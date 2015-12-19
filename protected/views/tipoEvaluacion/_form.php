<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'tipo-pregunta-form','enableAjaxValidation'=>true,)); ?>

	<p class="note">Campos con <span class="required">*</span> son boligatorios.</p>

	<?php echo $form->errorSummary($model); 
		echo $form->textFieldControlGroup($model,'tev_nombre',array('size'=>60,'maxlength'=>256)); 
		// echo $form->textFieldControlGroup($model,'tev_desabilitado'); 
		echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));
	$this->endWidget(); ?>

</div><!-- form -->