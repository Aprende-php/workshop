<?php
/* @var $this EmpresaController */
/* @var $data Empresa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_rut')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->emp_rut), array('view', 'id'=>$data->emp_rut)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tem_id')); ?>:</b>
	<?php echo CHtml::encode($data->tem_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('are_id')); ?>:</b>
	<?php echo CHtml::encode($data->are_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->emp_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->emp_direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_fono')); ?>:</b>
	<?php echo CHtml::encode($data->emp_fono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_email')); ?>:</b>
	<?php echo CHtml::encode($data->emp_email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->emp_fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_desabilitado')); ?>:</b>
	<?php echo CHtml::encode($data->emp_desabilitado); ?>
	<br />

	*/ ?>

</div>