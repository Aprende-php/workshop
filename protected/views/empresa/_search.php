<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'emp_rut'); ?>
		<?php echo $form->textField($model,'emp_rut',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tem_id'); ?>
		<?php echo $form->textField($model,'tem_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'are_id'); ?>
		<?php echo $form->textField($model,'are_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_nombre'); ?>
		<?php echo $form->textField($model,'emp_nombre',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_direccion'); ?>
		<?php echo $form->textField($model,'emp_direccion',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_fono'); ?>
		<?php echo $form->textField($model,'emp_fono',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_email'); ?>
		<?php echo $form->textField($model,'emp_email',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_fecha_creacion'); ?>
		<?php echo $form->textField($model,'emp_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emp_desabilitado'); ?>
		<?php echo $form->textField($model,'emp_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->