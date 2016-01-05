<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	'Administrar'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'Cancelar', 'url'=>array('admin')),
);
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo BsHtml::pageHeader('Crear','Tipo Pregunta') ?>
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>