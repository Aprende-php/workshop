<?php var_dump($_POST) ?>
<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm');
?>
<div class="well">
<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($List as $key=>$model): ?>
		<tr>
			<th><?php echo $model->are_nombre ?></th>
			<th>
<?php
	'name'=>'delete',
	'value'=>$key,
    'size' => BsHtml::BUTTON_SIZE_SMALL
));
?>
<?php
	'name'=>'update',
	'value'=>$key,
    'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    'size' => BsHtml::BUTTON_SIZE_SMALL
));
?>
			</th>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
</div>
<?php
$this->endWidget();
?>