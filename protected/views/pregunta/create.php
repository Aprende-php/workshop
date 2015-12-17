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
if($id==false){
	echo BsHtml::alert(BsHtml::ALERT_COLOR_DANGER, BsHtml::bold('Campo faltante') . " ".'Debe agregar un achivo de imagen.');
}
?>

<h1>Registrar Pregunta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>