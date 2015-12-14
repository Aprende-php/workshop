<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pregunta-form',
	// 'onsubmit'=>"return validacion()",
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tpr_id'); ?>
		<?php echo $form->dropDownList($model,'tpr_id',
			CHtml::listData(TipoPregunta::model()->findAll(),'tpr_id','tpr_nombre'),
			array('empty' => 'Seleccione Tipo de Pregunta'));?>
		<?php echo $form->error($model,'tpr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tev_id'); ?>
		<?php echo $form->dropDownList($model,'tev_id',
			CHtml::listData(TipoEvaluacion::model()->findAll(),'tev_id','tev_nombre'),
			array('empty' => 'Seleccione Tipo de Evaluacion'));?>
		<?php echo $form->error($model,'tev_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_descripcion'); ?>
		<?php echo $form->textField($model,'pre_descripcion',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'pre_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_comentario'); ?>
		<?php echo $form->textArea($model,'pre_comentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pre_comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_imagen'); ?>
		<?php echo CHtml::activeFileField($model,'pre_imagen',array('size'=>60,'maxlength'=>2048)); ?>
		<?php echo $form->error($model,'pre_imagen'); ?>
	</div>

<!-- 	<div class="row">
		<?php echo $form->labelEx($model,'pre_imagen_admin'); ?>
		<?php echo CHtml::activeFileField($model,'pre_imagen_admin',array('size'=>60,'maxlength'=>2048)); ?>
		<?php echo $form->error($model,'pre_imagen_admin'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'pre_fecha_creacion'); ?>
		<?php echo $form->dateField($model,'pre_fecha_creacion', array('value'=>date('Y-m-d'))); ?>
		<?php echo $form->error($model,'pre_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_desabilitado'); ?>
		<?php echo $form->textField($model,'pre_desabilitado'); ?>
		<?php echo $form->error($model,'pre_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->