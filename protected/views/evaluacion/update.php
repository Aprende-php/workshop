<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'administrar'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo BsHtml::pageHeader('Modificar','Evaluacion') ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>