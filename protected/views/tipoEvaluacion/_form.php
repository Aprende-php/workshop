<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'tipo-evaluacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son boligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="col-xs-12  col-md-6  col-sm-6">
	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'tev_nombre',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'tev_fecha_creacion', array('value'=>date('Y-m-d'))); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'tev_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->