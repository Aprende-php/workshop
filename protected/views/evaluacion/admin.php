<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Administrar',
);

if (!Yii::app()->user->isGuest) {
	if (Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol!='viewver') 
		$this->menu=array(
			array('label'=>'Informe Excel','url'=>array('excel'))
		);

	if (Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol=='users') {
		$empresa="Empresa"." ".$model->emp_nombre." / ".$model->emp_rut;
	}
	else
		if (Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol=='viewver') {
			$empresa="Usuario"." ".$model->usu_nombre." / ".$model->usu_rut;
		}
		else
			$empresa=null;
}
?>

<?= BsHtml::pageHeader('Administrar', 'Evaluaciones'." ".$empresa) ?>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
	'id'=>'pregunta-grid',
	'dataProvider'=>$model->search(),
	'type'=>array(BsHtml::GRID_TYPE_STRIPED,BsHtml::GRID_TYPE_BORDERED),
	'filter'=>$model,
	'columns'=>array(
		array(	'name'=>'emp_rut',
				'value'=>'$data->emp_rut',
				'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol!='users'),
		array(	'name'=>'emp_nombre',
				'value'=>'$data->emp_nombre',
				'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol!='users',
				'filter'=>false
				),
		array(	'name'=>'tev_id',
				'value'=>'TipoEvaluacion::model()->findByPk($data->tev_id)->tev_nombre'),
		array(	'name'=>'tel_numero',
				'value'=>'$data->tel_numero'),
		array(	'name'=>'usu_rut',
				'value'=>'$data->usu_rut',
				'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol!='viewver'),
		array(	'name'=>'eva_fecha',
				'value'=>'$data->eva_fecha'),
		array(	'name'=>'eva_numero',
				'value'=>'$data->eva_numero'),
		array(
        	//call the function 'renderButtons' from the current controller
        	'value'=>array($this,'renderButtons'),
    		),
		
	),)); ?>