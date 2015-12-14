<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	// 'Tipo Evaluacions'=>array('index'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'List TipoEvaluacion', 'url'=>array('index')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>

<h1>Registrar Tipo de Evaluación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>