<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
?>

<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->emp_rut=>array('view','id'=>$model->emp_rut),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Empresa', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Empresa', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Empresa', 'url'=>array('view', 'id'=>$model->emp_rut)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Empresa '.$model->emp_rut) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>