<?php
/* @var $this TipoEvaluacionController */
/* @var $data TipoEvaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tev_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tev_id), array('view', 'id'=>$data->tev_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tev_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->tev_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tev_fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->tev_fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tev_desabilitado')); ?>:</b>
	<?php echo CHtml::encode($data->tev_desabilitado); ?>
	<br />


</div>