<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */

$this->breadcrumbs=array(

	'Administrar',
);

$this->menu=array(

	array('label'=>'Registrar', 'url'=>array('create')),
);

?>

<h1>Administrar Tipo de Evaluación</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-evaluacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'tev_id',
		'tev_nombre',
		'tev_fecha_creacion',
		'tev_desabilitado',
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    		),
	),
)); ?>
