<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	'Administrar'=>array('admin'),
	'Editar',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo BsHtml::pageHeader('Modificar','Tipo Evaluación'." ".$model->tev_nombre) ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>