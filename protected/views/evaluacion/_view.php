<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->eva_id), array('view', 'id'=>$data->eva_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tev_id')); ?>:</b>
	<?php echo CHtml::encode($data->tev_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_rut')); ?>:</b>
	<?php echo CHtml::encode($data->emp_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_numero')); ?>:</b>
	<?php echo CHtml::encode($data->tel_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_rut')); ?>:</b>
	<?php echo CHtml::encode($data->usu_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->eva_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_numero')); ?>:</b>
	<?php echo CHtml::encode($data->eva_numero); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->eva_fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_desabilitado')); ?>:</b>
	<?php echo CHtml::encode($data->eva_desabilitado); ?>
	<br />

	*/ ?>

</div>