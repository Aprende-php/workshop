<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	// 'Preguntas'=>array('index'),
	'Preguntas',
);

$this->menu=array(
	// array('label'=>'Index', 'url'=>array('index')),
	array('label'=>'Registrar', 'url'=>array('create')),
);

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// 	$('.search-form').toggle();
// 	return false;
// });
// $('.search-form form').submit(function(){
// 	$('#pregunta-grid').yiiGridView('update', {
// 		data: $(this).serialize()
// 	});
// 	return false;
// });
// ");
?>

<h1>Administrar Preguntas</h1>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php 
	// echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
?>
<!-- <div class="search-form" style="display:none"> -->
<?php 
// 	$this->renderPartial('_search',array(
// 	'model'=>$model,
// )); 
?>

<!-- </div>search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pregunta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'pre_id',
		// 'tpr_id',
		// 'pre_imagen',
		array(	'name'=>'pre_imagen',
				'type'=>'image',
				// 'htmlOptions'=>array('width'=>'40px','height'=>'30px'),
				'value'=>'Yii::app()->request->baseUrl."/images/pregunta/".$data->pre_id.".png"'),
		array(	'name'=>'tpr_id',
				'value'=>'TipoPregunta::model()->findByPk($data->tpr_id)->tpr_nombre'),
		// 'tev_id',
		array(	'name'=>'tev_id',
				'value'=>'TipoEvaluacion::model()->findByPk($data->tev_id)->tev_nombre'),
		'pre_descripcion',
		'pre_comentario',
		
		/*
		'pre_imagen_admin',
		'pre_fecha_creacion',
		'pre_desabilitado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
