<?php
/* @var $this TipoPreguntaController */
/* @var $data TipoPregunta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tpr_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tpr_id), array('view', 'id'=>$data->tpr_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tpr_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->tpr_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tpr_fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->tpr_fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tpr_desabilitado')); ?>:</b>
	<?php echo CHtml::encode($data->tpr_desabilitado); ?>
	<br />


</div>