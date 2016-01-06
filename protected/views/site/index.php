<?php 
$this->beginWidget('bootstrap.widgets.BsPanel',array(
	'title'=>BsHtml::bold(BsHtml::italics('Bienvenido a QualitatCorp')),
	'decorationCssClass'=>'panel-x',
	'contentCssClass'=>'panel-body-x',
	'titleCssClass'	=>'panel-title-x',
	'titleTag'=>'panel-title-x',
	'footer'=>BsHtml::italics('Simulador de qualitat Corp<br>
Dalcahue 1120, Oficina 201 - San Pedro de la Paz, VIII Región'),
	'footerCssClass'=>'panel-foot-x'
	));
if (!Yii::app()->user->isGuest)
	$usuario=Usuario::model()->findByPk(Yii::app()->user->id);
else
	$usuario=new Usuario;
?>
<div class="row">
	<div class="col-xs-10 col-sm-12">
		<div class="col-xs-4 col-sm-4">
		<?php echo BsHtml::imageThumbnail(	Yii::app()->request->baseUrl."/images/logo.png",'',$htmlOptions = array(
					'style'=> 'width: 100%; height: 40%;border-radius: 15px;margin-bottom: 10%;border:none;padding:-5% -5%'));?>
		</div>
		<div class="col-xs-8 col-sm-8">
		<?php  echo "<br><br>Bienvenido "." ".$usuario->usu_nombre." a QualitatCorp<br>Administración - Realidad Virtual Inmersiva
					Plataforma de administración web Versión 3.0 
					©2016 Qualitat Corp todos los derechos reservados. ";
			?>
		</div>
	</div>
</div>
<?php 
	$this->endWidget();
?>