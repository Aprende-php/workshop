<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	// $model->tpr_nombre=>array('view','id'=>$model->tpr_id),
	'administrar'=>array('admin'),
	'Editar',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo BsHtml::pageHeader('Modificar','Tipo Pregunta'." ".$model->tpr_nombre) ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>