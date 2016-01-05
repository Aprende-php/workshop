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

<?php $this->widget('bootstrap.widgets.BsGridView', array(
	'id'=>'pregunta-grid',
	'dataProvider'=>$model->search(),
	'type'=>array(BsHtml::GRID_TYPE_STRIPED,BsHtml::GRID_TYPE_BORDERED),
	'filter'=>$model,
	'columns'=>array(
		'tpr_nombre',
		'tpr_fecha_creacion',
		array(	'name'=>'tpr_desabilitado',
				'value'=>'$data->tpr_desabilitado',
				'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol=="admins"),
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    	),
	),
)); ?>
