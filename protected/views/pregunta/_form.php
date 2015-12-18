<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
	'id'=>'pregunta-form','enableAjaxValidation'=>true,'htmlOptions'=>array('enctype'=>'multipart/form-data'),)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>
<?php	 echo $form->errorSummary($model); 
		 echo $form->dropDownListControlGroup($model,'tpr_id',CHtml::listData(TipoPregunta::model()->findAll(),'tpr_id','tpr_nombre'),array('empty' => 'Seleccione Tipo de Pregunta'));
		 echo $form->dropDownListControlGroup($model,'tev_id',CHtml::listData(TipoEvaluacion::model()->findAll(),'tev_id','tev_nombre'),array('empty' => 'Seleccione Tipo de Evaluacion'));
		 echo $form->textFieldControlGroup($model,'pre_descripcion',array('size'=>60,'maxlength'=>512)); 
		 echo $form->textAreaControlGroup($model,'pre_comentario',array('rows'=>6, 'cols'=>50)); 
		 echo $form->labelEx($model,'pre_imagen'); 
		 echo $form->fileField($model, 'pre_imagen', array('value'	=>$model->pre_imagen));
     	 if (is_file('images/pregunta/'.$model->pre_imagen))echo CHtml::image(Yii::app()->request->baseUrl."/images/pregunta/".$model->pre_imagen,'',array("width"=>100,"height"=>100));  
		 echo $form->dateFieldControlGroup($model,'pre_fecha_creacion', array('value'=>date('Y-m-d'))); 
		 echo $form->textFieldControlGroup($model,'pre_desabilitado'); 
		 echo BsHtml::submitButton('Aceptar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY));


 $this->endWidget(); ?>

</div><!-- form -->