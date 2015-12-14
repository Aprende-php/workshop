<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'tipo-pregunta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

<div class="col-xs-12  col-md-6  col-sm-6">
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'tpr_nombre',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->dateFieldControlGroup($model,'tpr_fecha_creacion', array('value'=>date('Y-m-d'))); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'tpr_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->