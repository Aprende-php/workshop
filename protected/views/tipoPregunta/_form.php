<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'tipo-pregunta-form','layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); 
		 echo $form->textFieldControlGroup($model,'tpr_nombre',array('size'=>60,'maxlength'=>256)); 
		 // echo $form->textFieldControlGroup($model,'tpr_desabilitado'); 
		 echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));
 	$this->endWidget(); ?>

</div><!-- form -->