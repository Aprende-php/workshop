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

		echo $form->dropDownListControlGroup($model, 'tev_id', CHtml::listData(TipoEvaluacion::model()->findAll('tev_desabilitado=0'),'tev_id', 'tev_nombre'), array('empty' => 'Seleccione un tipo de evaluación'));
		echo $form->textFieldControlGroup($model,'emp_rut',array('size'=>13,'maxlength'=>13,'disabled'=>true)); 
		echo $form->numberFieldControlGroup($model,'tel_numero'); 
		echo $form->textFieldControlGroup($model,'usu_rut',array('size'=>13,'maxlength'=>13,'disabled'=>true)); 
		echo $form->numberFieldControlGroup($model,'eva_numero',array('size'=>10,'maxlength'=>10)); 
		echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); 

$this->endWidget(); ?>

</div><!-- form -->