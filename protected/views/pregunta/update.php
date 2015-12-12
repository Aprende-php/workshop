<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->pre_id=>array('view','id'=>$model->pre_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Create Pregunta', 'url'=>array('create')),
	array('label'=>'View Pregunta', 'url'=>array('view', 'id'=>$model->pre_id)),
	array('label'=>'Manage Pregunta', 'url'=>array('admin')),
);
?>

<h1>Update Pregunta <?php echo $model->pre_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>