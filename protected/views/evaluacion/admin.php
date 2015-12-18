<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

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
	'Administrar',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
);
?>

<?= BsHtml::pageHeader('Administrar', 'Evaluaciones') ?>

<?php 
// 	$this->widget('zii.widgets.grid.CGridView', array(
// 	'id'=>'evaluacion-grid',
// 	'dataProvider'=>$model->search(),
// 	'filter'=>$model,
// 	'columns'=>array(
// 		array(	'name'=>'tev_id',
// 				'value'=>'TipoEvaluacion::model()->findByPk($data->tev_id)->tev_nombre'),
// 		'emp_rut',
// 		'tel_numero',
// 		'usu_rut',
// 		'eva_fecha',
// 		'eva_numero',
// 		'eva_fecha_creacion',
// 		'eva_desabilitado',
// 		array(
//         	//call the function 'renderButtons' from the current controller
//         	'value'=>array($this,'renderButtons'),
//     	),
// 	),
// )); 
?>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width:20px">#</th>
			<th>Tipo Evaluación</th>
			<th>Rut Empresa</th>
			<th>Empresa</th>
			<th>Telefono</th>
			<th>Rut Usuario</th>
			<!-- <th>Usuario</th> -->
			<th>Fecha</th>
			<th>Numero Evaluación</th>
			<th style="width:50px">Opciones</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($List as $key=>$model): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $model->tev_id ?></td>
			<td><?php echo $model->emp_rut ?></td>
			<td><?php echo $model->emp_nombre ?></td>
			<td><?php echo $model->tel_numero ?></td>
			<td><?php echo $model->usu_rut ?></td>
			<td><?php echo $model->eva_fecha ?></td>
			<td><?php echo $model->eva_numero ?></td>
			<td>
				<?php
					// echo BsHtml::Button(BsHtml::icon(BsHtml::GLYPHICON_TRASH).' Eliminar', array(
					//     'color' => BsHtml::BUTTON_COLOR_PRIMARY,
					//     'size' => BsHtml::BUTTON_SIZE_SMALL,
					//     'data-target'=>'#Eliminar'.$key,
					//     'data-toggle'=>'modal'
					// ));

					// $this->widget('bootstrap.widgets.BsModal', array(
					//     'id' => 'Eliminar'.$key,
					//     'header' => "¿Desea eliminar a '$model->emp_nombre' ?",
					//     'content' => "<p>Se quitara de la lista $model->emp_nombre</p>",
					//     'footer' => array(
					//         BsHtml::Button('Eliminar de todos modos', array(
					// 			'onclick'=>"window.location.href='deleteE?rut=$model->emp_rut'",
					// 		    'color' => BsHtml::BUTTON_COLOR_PRIMARY
					// 		)),
					//         BsHtml::button('Cancelar', array(
					//             'data-dismiss' => 'modal'
					//         )),

					//     )
					// ));

					?>
					<?php
					// echo BsHtml::Button(BsHtml::icon(BsHtml::GLYPHICON_EDIT).' Modificar', array(
					//     'color' => BsHtml::BUTTON_COLOR_PRIMARY,
					//     'size' => BsHtml::BUTTON_SIZE_SMALL,
					// 	'onclick'=>"window.location.href='update?rut=$model->emp_rut'",
					// ));
				?>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
