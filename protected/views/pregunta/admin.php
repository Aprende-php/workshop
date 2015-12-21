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

// echo (CHtml::image(Yii::app()->baseUrl . 
// 	'/images/pregunta/black-dofus-149440.png.png','black-dofus-149440.png.png',array('width'=>100)));
// die();


 ?>

<?= BsHtml::pageHeader('Administrar', 'Preguntas') ?>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
	'id'=>'pregunta-grid',
	'dataProvider'=>$model->search(),
	'type'=>array(BsHtml::GRID_TYPE_STRIPED,BsHtml::GRID_TYPE_BORDERED),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'pre_imagen',
        	//call the function 'renderImage' from the current controller
        	'value'=>array($this,'renderImage'),
        	'filter'=>false,
        	'htmlOptions'=>array('style'=>"width:135px"),
    		),
		array(	'name'=>'tpr_id',
				'value'=>'TipoPregunta::model()->findByPk($data->tpr_id)->tpr_nombre'),
		array(	'name'=>'tev_id',
				'value'=>'TipoEvaluacion::model()->findByPk($data->tev_id)->tev_nombre'),
		'pre_descripcion',
		'pre_comentario',
		'pre_fecha_creacion',
		'pre_desabilitado',
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    		),
		
	),
)); ?>
