<?php
$this->breadcrumbs=array(
	'Teléfono'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Administar Teléfono', 'url'=>array('admin')),
);
?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
<?php echo BsHtml::pageHeader('Crear','Teléfono') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
  </div>
</div>