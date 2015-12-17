<?php
$baseUrl=Yii::app()->baseUrl;
Yii::app()->getClientScript()
	->registerCssFile($baseUrl.'/css/dataTables.bootstrap.min.css')
	->registerScriptFile($baseUrl.'/js/jquery.dataTables.min.js',CClientScript::POS_END)
	->registerScriptFile($baseUrl.'/js/dataTables.bootstrap.min.js',CClientScript::POS_END)
	->registerScript('dataTables', "$('.table').DataTable({
        'language': {
 			\"url\": \"$baseUrl/js/Spanish.json\"
		}
	})", CClientScript::POS_READY);

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Administrar',
);
$this->menu=array(
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Crear Teléfono', 'url'=>array('create')),
);

?>

<?= BsHtml::pageHeader('Administración', 'Teléfono') ?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width:20px">#</th>
			<th>Número</th>
			<th>Compañia</th>
			<th>MAC</th>
			<th>Activado</th>
			<th>Empresa</th>
			<th style="width:160px">Opciones</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($List as $key=>$model): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $model->tel_numero ?></td>
			<td><?php echo $model->com_nombre ?></td>
			<td><?php echo $model->tel_mac ?></td>
			<td><?php echo $model->tel_activado ?></td>
			<td><?php echo $model->emp_nombre ?></td>
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
					    'header' => "¿Desea eliminar a '$model->emp_nombre' ?",
					    'content' => "<p>Se quitara de la lista $model->emp_nombre</p>",
					    'footer' => array(
					        BsHtml::Button('Eliminar de todos modos', array(
								'onclick'=>"window.location.href='deleteE?rut=$model->emp_rut'",
							    'color' => BsHtml::BUTTON_COLOR_PRIMARY
							)),
					        BsHtml::button('Cancelar', array(
					            'data-dismiss' => 'modal'
					        )),

					    )
					));
					echo BsHtml::Button(BsHtml::icon(BsHtml::GLYPHICON_EDIT).' Modificar', array(
					    'color' => BsHtml::BUTTON_COLOR_PRIMARY,
					    'size' => BsHtml::BUTTON_SIZE_SMALL,
						'onclick'=>"window.location.href='update?rut=$model->emp_rut'",
					));
				?>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>