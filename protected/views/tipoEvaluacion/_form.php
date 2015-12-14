<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-evaluacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son boligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tev_nombre'); ?>
		<?php echo $form->textField($model,'tev_nombre',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'tev_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tev_fecha_creacion'); ?>
		<?php echo $form->textField($model,'tev_fecha_creacion', array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'tev_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tev_desabilitado'); ?>
		<?php echo $form->textField($model,'tev_desabilitado'); ?>
		<?php echo $form->error($model,'tev_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->