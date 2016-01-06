<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
);
?>
<?php 

 ?>

<?= BsHtml::pageHeader('Administrar', 'Preguntas') ?>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
	'id'=>'pregunta-grid',
	'dataProvider'=>$model->search(),
	'type'=>array(BsHtml::GRID_TYPE_STRIPED,BsHtml::GRID_TYPE_BORDERED),
	'filter'=>$model,
	'htmlOptions'=>array('style'=>"color:#000"),
	'columns'=>array(
		array('name'=>'pre_imagen',
        	//call the function 'renderImage' from the current controller
        	'value'=>array($this,'renderImage'),
        	'filter'=>false,
        	'htmlOptions'=>array('style'=>"width:135px"),
    		),
		array(	'name'=>'tpr_id',
				'value'=>'$data->tpr_nombre',
				// 'htmlOptions'=>array('style'=>"color:#000"),
				),
		array(	'name'=>'tev_id',
				'value'=>'$data->tev_nombre'),
		'pre_descripcion',
		'pre_comentario',
		'pre_fecha_creacion',
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    		),
		
	),
)); ?>
