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
// var_dump(Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol=="admins");
// die();

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
		// array(	'name'=>'pre_desabilitado',
		// 		'value'=>'$data->pre_desabilitado',
		// 		'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol=="admins"),
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    		),
		
	),
)); ?>
