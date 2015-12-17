<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('admin'),
	$model->pre_descripcion=>array('view','id'=>$model->pre_id),
	'Editar',
);

$this->menu=array(
	// array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Detalle', 'url'=>array('view', 'id'=>$model->pre_id)),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
if($id==false){
	echo BsHtml::alert(BsHtml::ALERT_COLOR_DANGER, BsHtml::bold('Campo faltante') . " ".'Debe agregar un achivo de imagen.');
}
?>

<h1>Editar Pregunta <?php echo $model->pre_descripcion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>