<?php
$this->breadcrumbs=array(
	'Administración Tipo'
);

$this->menu=array(

    array('icon' => 'glyphicon glyphicon-plus','label'=>'Crear Tipo', 'url'=>array('createTE')),
);
?>

<?= BsHtml::pageHeader('Administración Tipo', 'Empresa') ?>
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
			<td><?php echo $model->tem_nombre ?></td>
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
    'header' => "¿Desea eliminar a '$model->tem_nombre' ?",
    'content' => "<p>Se quitara de la lista $model->tem_nombre</p>",
    'footer' => array(
        BsHtml::Button('Eliminar de todos modos', array(
			'onclick'=>"window.location.href='deleteTE/$model->tem_id'",
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
	'onclick'=>"window.location.href='updateTE/$model->tem_id'",
));
?>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>