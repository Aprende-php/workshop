<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->pre_id,
);

$this->menu=array(
	array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Create Pregunta', 'url'=>array('create')),
	array('label'=>'Update Pregunta', 'url'=>array('update', 'id'=>$model->pre_id)),
	array('label'=>'Delete Pregunta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pre_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pregunta', 'url'=>array('admin')),
);
?>

<h1>View Pregunta #<?php echo $model->pre_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pre_id',
		'tpr_id',
		'tev_id',
		'pre_descripcion',
		'pre_comentario',
		'pre_imagen',
		'pre_imagen_admin',
		'pre_fecha_creacion',
		'pre_desabilitado',
	),
)); ?>
