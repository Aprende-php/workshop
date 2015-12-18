<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'eva_id'); ?>
		<?php echo $form->textField($model,'eva_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tev_id'); ?>
		<?php echo $form->textField($model,'tev_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_rut'); ?>
		<?php echo $form->textField($model,'emp_rut',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel_numero'); ?>
		<?php echo $form->textField($model,'tel_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_rut'); ?>
		<?php echo $form->textField($model,'usu_rut',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_fecha'); ?>
		<?php echo $form->textField($model,'eva_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_numero'); ?>
		<?php echo $form->textField($model,'eva_numero',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_fecha_creacion'); ?>
		<?php echo $form->textField($model,'eva_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_desabilitado'); ?>
		<?php echo $form->textField($model,'eva_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->