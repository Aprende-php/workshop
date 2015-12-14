<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	'Administrar'=>array('admin'),
	$model->tev_nombre,
);

$this->menu=array(
	// array('label'=>'List TipoEvaluacion', 'url'=>array('index')),
	// array('label'=>'Create TipoEvaluacion', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->tev_id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tev_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Detalle Tipo de Evaluación<?php echo $model->tev_nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'tev_id',
		'tev_nombre',
		'tev_fecha_creacion',
		'tev_desabilitado',
	),
)); ?>
