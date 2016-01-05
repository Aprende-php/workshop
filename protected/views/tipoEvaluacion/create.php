<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(
	'Administrar'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	// array('label'=>'List TipoEvaluacion', 'url'=>array('index')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo BsHtml::pageHeader('Crear','Tipo Evaluación') ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>