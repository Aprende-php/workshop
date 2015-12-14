<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	// 'Tipo Evaluacions'=>array('index'),
	$model->tev_nombre=>array('view','id'=>$model->tev_id),
	'Editar',
);

$this->menu=array(
	// array('label'=>'List TipoEvaluacion', 'url'=>array('index')),
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Detalle', 'url'=>array('view', 'id'=>$model->tev_id)),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>

<h1>Editar Tipo de Evaluación <?php echo $model->tev_nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>