<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
?>

<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->emp_rut=>array('view','id'=>$model->emp_rut),
	'Modificar',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Crear Empresa', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
<?php echo BsHtml::pageHeader('Modificar','Empresa '.$model->emp_rut) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>