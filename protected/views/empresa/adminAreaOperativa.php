<?php
$this->breadcrumbs=array(
	'Administración Área Operativa'
);

$this->menu=array(

    array('icon' => 'glyphicon glyphicon-plus','label'=>'Crear Área Operativa', 'url'=>array('createAO')),
);
?>

<?= BsHtml::pageHeader('Administración área operativa', 'Empresa') ?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width:20px">#</th>
			<th>Nombre</th>
			<th style="width:200px">Opciones</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($List as $key=>$model): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $model->are_nombre ?></td>
			<td>
<?php
echo BsHtml::Button(BsHtml::icon(BsHtml::GLYPHICON_TRASH).' Eliminar', array(
    'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    'size' => BsHtml::BUTTON_SIZE_SMALL,
    'data-target'=>'#Eliminar'.$key,
    'data-toggle'=>'modal'
));
$this->widget('bootstrap.widgets.BsModal', array(
    'id' => 'Eliminar'.$key,
    'header' => "¿Desea eliminar a '$model->are_nombre' ?",
    'content' => "<p>Se quitara de la lista $model->are_nombre</p>",
    'footer' => array(
        BsHtml::Button('Eliminar de todos modos', array(
			'onclick'=>"window.location.href='deleteAO/$model->are_id'",
		    'color' => BsHtml::BUTTON_COLOR_PRIMARY
		)),
        BsHtml::button('Cancelar', array(
            'data-dismiss' => 'modal'
        )),

    )
));

?>
<?php
echo BsHtml::Button(BsHtml::icon(BsHtml::GLYPHICON_EDIT).' Modificar', array(
    'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    'size' => BsHtml::BUTTON_SIZE_SMALL,
	'onclick'=>"window.location.href='updateAO/$model->are_id'",
));
?>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>