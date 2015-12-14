<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	// 'Tipo Preguntas'=>array('index'),
	$model->tpr_nombre=>array('view','id'=>$model->tpr_id),
	'Editar',
);

$this->menu=array(
	// array('label'=>'List TipoPregunta', 'url'=>array('index')),
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Detalle', 'url'=>array('view', 'id'=>$model->tpr_id)),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>

<h1>Editar Tipo de Pregunta <?php echo $model->tpr_nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>