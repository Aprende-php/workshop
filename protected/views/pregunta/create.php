<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>

<h1>Registrar Pregunta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>