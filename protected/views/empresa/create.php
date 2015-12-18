<?php
$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Administar Empresa', 'url'=>array('admin')),
);
?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
<?php echo BsHtml::pageHeader('Crear','Empresa') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
  </div>
</div>