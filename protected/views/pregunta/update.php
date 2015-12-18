<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('admin'),
	$model->pre_descripcion=>array('view','id'=>$model->pre_id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php  if($id==false)echo BsHtml::alert(BsHtml::ALERT_COLOR_DANGER, BsHtml::bold('Campo faltante') . " ".'Debe agregar un achivo de imagen.');?>
		<?php echo BsHtml::pageHeader('Modificar','Pregunta') ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>
