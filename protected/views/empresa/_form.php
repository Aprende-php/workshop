<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_rut'); ?>
		<?php echo $form->textField($model,'emp_rut',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'emp_rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tem_id'); ?>
		<?php echo $form->textField($model,'tem_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'are_id'); ?>
		<?php echo $form->textField($model,'are_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'are_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_nombre'); ?>
		<?php echo $form->textField($model,'emp_nombre',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'emp_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_direccion'); ?>
		<?php echo $form->textField($model,'emp_direccion',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'emp_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_fono'); ?>
		<?php echo $form->textField($model,'emp_fono',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'emp_fono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_email'); ?>
		<?php echo $form->textField($model,'emp_email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'emp_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_fecha_creacion'); ?>
		<?php echo $form->textField($model,'emp_fecha_creacion'); ?>
		<?php echo $form->error($model,'emp_fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_desabilitado'); ?>
		<?php echo $form->textField($model,'emp_desabilitado'); ?>
		<?php echo $form->error($model,'emp_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->