<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->pre_id,
);

$this->menu=array(
	// array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->pre_id)),
	array('label'=>'Borrar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pre_id),'confirm'=>'Esta seguro de borrar este item?')),
	array('label'=>'Volver', 'url'=>array('admin')),
);
?>

<h1>Detalle Pregunta <?php echo $model->pre_descripcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'pre_id',
		// 'tpr_id',
		// 'tev_id',
		array(	'name'=>'tpr_id',
				'value'=>TipoPregunta::model()->findByPk($model->tpr_id)->tpr_nombre),
		array(	'name'=>'tev_id',
				'value'=>TipoEvaluacion::model()->findByPk($model->tev_id)->tev_nombre),
		'pre_descripcion',
		'pre_comentario',
		'pre_imagen',
		'pre_imagen_admin',
		'pre_fecha_creacion',
		'pre_desabilitado',
	),
)); ?>
