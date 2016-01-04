<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

// $baseUrl=Yii::app()->baseUrl;
// Yii::app()->getClientScript()
// 	->registerCssFile($baseUrl.'/css/dataTables.bootstrap.min.css')
// 	->registerScriptFile($baseUrl.'/js/jquery.dataTables.min.js',CClientScript::POS_END)
// 	->registerScriptFile($baseUrl.'/js/dataTables.bootstrap.min.js',CClientScript::POS_END)
// 	->registerScript('dataTables', "$('.table').DataTable({
//         'language': {
//  			\"url\": \"$baseUrl/js/Spanish.json\"
// 		}
// 	})", CClientScript::POS_READY);

$this->breadcrumbs=array(
	'Administrar',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Informe Excel','url'=>array(''),'onclick'=>"window.open(href='excel?id=$model->eva_id')"),
);
?>

<?= BsHtml::pageHeader('Administrar', 'Evaluaciones') ?>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
	'id'=>'pregunta-grid',
	'dataProvider'=>$model->search(),
	'type'=>array(BsHtml::GRID_TYPE_STRIPED,BsHtml::GRID_TYPE_BORDERED),
	'filter'=>$model,
	'columns'=>array(
		array(	'name'=>'emp_rut',
				'value'=>'$data->emp_rut'),
		array(	'name'=>'emp_nombre',
				'value'=>'$data->emp_nombre',
				'filter'=>false
				),
		array(	'name'=>'tev_id',
				'value'=>'TipoEvaluacion::model()->findByPk($data->tev_id)->tev_nombre'),
		array(	'name'=>'tel_numero',
				'value'=>'$data->tel_numero'),
		array(	'name'=>'usu_rut',
				'value'=>'$data->usu_rut'),
		// array(	'name'=>'usu_nombre',
		// 		'value'=>'$data->usu_nombre',
		// 		'filter'=>false),
		array(	'name'=>'eva_fecha',
				'value'=>'$data->eva_fecha'),
		array(	'name'=>'eva_numero',
				'value'=>'$data->eva_numero'),
		// array(	'name'=>'eva_desabilitado',
		// 		'value'=>'$data->eva_desabilitado',
		// 		'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol=="admins"),
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    		),
		
	),)); ?>

<!-- <table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width:20px">#</th>
			<th>Tipo Evaluación</th>
			<th>Rut Empresa</th>
			<th>Empresa</th>
			<th>Telefono</th>
			<th>Rut Usuario</th>
			<th>Usuario</th>
			<th>Fecha</th>
			<th>Numero Evaluación</th>
			<th style="width:50px">Opciones</th>
		</tr>
	</thead>
	<tbody>
	<?php //foreach ($List as $key=>$model): ?>
		<tr>
			<td><?php //echo $key+1; ?></td>
			<td><?php //echo $model->tev_nombre ?></td>
			<td><?php //echo $model->emp_rut ?></td>
			<td><?php //echo $model->emp_nombre ?></td>
			<td><?php //echo $model->tel_numero ?></td>
			<td><?php //echo $model->usu_rut ?></td>
			<td><?php //echo $model->usu_nombre ?></td> 
			<td><?php //echo $model->eva_fecha ?></td>
			<td><?php //echo $model->eva_numero ?></td>
			<td><?php //$this->renderButtons($model)
					?>
			</td>
		</tr>
	<?php //endforeach ?>
	</tbody>
</table> -->
