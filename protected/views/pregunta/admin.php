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

<h1>Administrar Preguntas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pregunta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'pre_id',
		// 'tpr_id',
		// 'pre_imagen',
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderImage'),
    		),
		array(	'name'=>'tpr_id',
				'value'=>'TipoPregunta::model()->findByPk($data->tpr_id)->tpr_nombre'),
		// 'tev_id',
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
