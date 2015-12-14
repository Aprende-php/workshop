<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->emp_rut=>array('view','id'=>$model->emp_rut),
	'Update',
);

$this->menu=array(
	array('label'=>'List Empresa', 'url'=>array('index')),
	array('label'=>'Create Empresa', 'url'=>array('create')),
	array('label'=>'View Empresa', 'url'=>array('view', 'id'=>$model->emp_rut)),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>Update Empresa <?php echo $model->emp_rut; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>