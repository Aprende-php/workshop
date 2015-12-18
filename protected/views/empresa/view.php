<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
?>

<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->emp_rut,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Empresa', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Empresa', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Empresa', 'url'=>array('update', 'id'=>$model->emp_rut)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->emp_rut),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Empresa '.$model->emp_rut) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'emp_rut',
		'tem_id',
		'are_id',
		'emp_nombre',
		'emp_direccion',
		'emp_fono',
		'emp_email',
		'emp_fecha_creacion',
		'emp_desabilitado',
	),
)); ?>