<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pre_id'); ?>
		<?php echo $form->textField($model,'pre_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tpr_id'); ?>
		<?php echo $form->textField($model,'tpr_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tev_id'); ?>
		<?php echo $form->textField($model,'tev_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_descripcion'); ?>
		<?php echo $form->textField($model,'pre_descripcion',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_comentario'); ?>
		<?php echo $form->textArea($model,'pre_comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_imagen'); ?>
		<?php echo $form->textField($model,'pre_imagen',array('size'=>60,'maxlength'=>2048)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_imagen_admin'); ?>
		<?php echo $form->textField($model,'pre_imagen_admin',array('size'=>60,'maxlength'=>2048)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_fecha_creacion'); ?>
		<?php echo $form->textField($model,'pre_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_desabilitado'); ?>
		<?php echo $form->textField($model,'pre_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->