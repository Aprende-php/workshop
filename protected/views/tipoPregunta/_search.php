<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tpr_id'); ?>
		<?php echo $form->textField($model,'tpr_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tpr_nombre'); ?>
		<?php echo $form->textField($model,'tpr_nombre',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tpr_fecha_creacion'); ?>
		<?php echo $form->textField($model,'tpr_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tpr_desabilitado'); ?>
		<?php echo $form->textField($model,'tpr_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->