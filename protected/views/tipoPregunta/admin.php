<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	'Administrar',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
);?>

<?php echo BsHtml::pageHeader('Administar','Tipo Pregunta') ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-pregunta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tpr_nombre',
		'tpr_fecha_creacion',
		'tpr_desabilitado',
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    	),
	),
)); ?>
