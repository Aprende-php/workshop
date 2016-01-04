<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
?>

<?php
$this->breadcrumbs=array(
	'Licencia'=>array('licencia'),
	$model->emp_rut,
	'Modificar',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Crear Licencia', 'url'=>array('createLI')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Administrar Licencia', 'url'=>array('licencia')),
);
?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
<?php echo BsHtml::pageHeader('Modificar','Licencia '.$model->lic_id) ?>
<?php $this->renderPartial('_formLI', array('model'=>$model)); ?>
</div>
</div>
<?php