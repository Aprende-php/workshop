<?php
$baseUrl=Yii::app()->baseUrl;
Yii::app()->getClientScript()
	->registerCssFile($baseUrl.'/css/dataTables.bootstrap.min.css')
	->registerScriptFile($baseUrl.'/js/jquery.dataTables.min.js',CClientScript::POS_END)
	->registerScriptFile($baseUrl.'/js/dataTables.bootstrap.min.js',CClientScript::POS_END)
	->registerScript('dataTables', "$('.table').DataTable({
        'language': {
			    \"sProcessing\":     \"Procesando...\",
			    \"sLengthMenu\":     \"Mostrar _MENU_ registros\",
			    \"sZeroRecords\":    \"No se encontraron resultados\",
			    \"sEmptyTable\":     \"Ningún dato disponible en esta tabla\",
			    \"sInfo\":           \"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros\",
			    \"sInfoEmpty\":      \"Mostrando registros del 0 al 0 de un total de 0 registros\",
			    \"sInfoFiltered\":   \"(filtrado de un total de _MAX_ registros)\",
			    \"sInfoPostFix\":    \"\",
			    \"sSearch\":         \"Buscar:\",
			    \"sUrl\":            \"\",
			    \"sInfoThousands\":  \",\",
			    \"sLoadingRecords\": \"Cargando...\",
			    \"oPaginate\": {
			        \"sFirst\":    \"Primero\",
			        \"sLast\":     \"Último\",
			        \"sNext\":     \"Siguiente\",
			        \"sPrevious\": \"Anterior\"
			    },
			    \"oAria\": {
			        \"sSortAscending\":  \": Activar para ordenar la columna de manera ascendente\",
			        \"sSortDescending\": \": Activar para ordenar la columna de manera descendente\"
			    }
		}
	})", CClientScript::POS_READY);

$this->breadcrumbs=array(
	'Usuario',
	'registros',
);
$this->menu=array(
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Crear Usuario', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Administración Usuario', 'url'=>array('admin')),
);

?>
<?= BsHtml::pageHeader('Registros', 'Usuarios') ?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width:20px">#</th>
			<th>Ingreso</th>
			<th>RUT</th>
			<th>Navegador</th>
			<th>IP</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($List as $key=>$model): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $model['ing_fecha_ingreso'] ?></td>
			<td><?php echo $model['usu_rut'] ?></td>
			<td><?php echo $model['ing_navegador'] ?></td>
			<td><?php echo $model['ing_ip'] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

<h1><?=Yii::app()->request->getUserHostAddress(); ?></h1>