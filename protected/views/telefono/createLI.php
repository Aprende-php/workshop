<?php
$this->breadcrumbs=array(
	'Licencia'=>array('Licencia'),
	'Crear',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Administar Licencia', 'url'=>array('licencia')),
);
?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
<?php echo BsHtml::pageHeader('Crear','Licencia') ?>

<?php $this->renderPartial('_formLI', array('model'=>$model)); ?>
  </div>
</div>