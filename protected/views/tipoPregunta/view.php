<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	'Administrar'=>array('admin'),
	$model->tpr_nombre,
);

$this->menu=array(
	// array('label'=>'List TipoPregunta', 'url'=>array('index')),
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->tpr_id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tpr_id),'confirm'=>'Esta seguro de elimina este item?')),
	// array('label'=>'Administrar Tipo de Pregunta', 'url'=>array('admin')),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Detalle Tipo de Pregunta <?php echo $model->tpr_nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'tpr_id',
		'tpr_nombre',
		'tpr_fecha_creacion',
		'tpr_desabilitado',
	),
)); ?>
