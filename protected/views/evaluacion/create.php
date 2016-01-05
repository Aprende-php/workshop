<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Administrar'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'Cancela', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo BsHtml::pageHeader('Crear','Evaluación') ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>