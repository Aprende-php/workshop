<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	// 'Administrar'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'Index', 'url'=>array('index')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>

<h1>Registrar Tipo de Pregunta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>