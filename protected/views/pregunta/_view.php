<?php
/* @var $this PreguntaController */
/* @var $data Pregunta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pre_id), array('view', 'id'=>$data->pre_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tpr_id')); ?>:</b>
	<?php echo CHtml::encode($data->tpr_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tev_id')); ?>:</b>
	<?php echo CHtml::encode($data->tev_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->pre_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_comentario')); ?>:</b>
	<?php echo CHtml::encode($data->pre_comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_imagen')); ?>:</b>
	<?php echo CHtml::encode($data->pre_imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_imagen_admin')); ?>:</b>
	<?php echo CHtml::encode($data->pre_imagen_admin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->pre_fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_desabilitado')); ?>:</b>
	<?php echo CHtml::encode($data->pre_desabilitado); ?>
	<br />

	*/ ?>

</div>