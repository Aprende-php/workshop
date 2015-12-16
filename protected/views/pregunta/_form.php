<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'pregunta-form',
	// 'onsubmit'=>"return validacion()",
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="col-xs-12  col-md-6  col-sm-6">
	<div class="row">
		<?php echo $form->dropDownListControlGroup($model,'tpr_id',
			CHtml::listData(TipoPregunta::model()->findAll(),'tpr_id','tpr_nombre'),
			array('empty' => 'Seleccione Tipo de Pregunta'));?>
	</div>

	<div class="row">
		<?php echo $form->dropDownListControlGroup($model,'tev_id',
			CHtml::listData(TipoEvaluacion::model()->findAll(),'tev_id','tev_nombre'),
			array('empty' => 'Seleccione Tipo de Evaluacion'));
			?>
	</div>

	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'pre_descripcion',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->textAreaControlGroup($model,'pre_comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_imagen'); ?>
		<?php echo $form->fileField($model, 'pre_imagen', array('value'	=>$model->pre_imagen));?>
	</div>

	<div class="row">
     <?php
     if (is_file('images/pregunta/'.$model->pre_imagen))
     	echo CHtml::image(Yii::app()->request->baseUrl."/images/pregunta/".$model->pre_imagen,'',array("width"=>150)); ?> 
	</div>

	<div class="row">
		<?php echo $form->dateFieldControlGroup($model,'pre_fecha_creacion', array('value'=>date('Y-m-d'))); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldControlGroup($model,'pre_desabilitado'); ?>
	</div>

	<div class="row buttons">
		<?php echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->