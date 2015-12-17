<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tev_id'); ?>
		<?php echo $form->textField($model,'tev_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tev_nombre'); ?>
		<?php echo $form->textField($model,'tev_nombre',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tev_fecha_creacion'); ?>
		<?php echo $form->textField($model,'tev_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tev_desabilitado'); ?>
		<?php echo $form->textField($model,'tev_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->