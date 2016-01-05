<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
    $baseUrl = Yii::app()->baseUrl; 
	Yii::app()->getClientScript()
		->registerCssFile($baseUrl.'/css/bootstrap.cerulean.min.css')
		->registerCoreScript('jquery')
		->registerScriptFile($baseUrl.'/js/bootstrap.js',CClientScript::POS_END);
	?>
    <link rel="icon" type="image/png" href="<?=$baseUrl ?>/images/favicon.png" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="container">    <?php
if(!Yii::app()->user->isGuest){
    $usuario=Usuario::model()->findBypk(Yii::app()->user->id);
    if ($usuario->usu_rol=="admins")
        $ocultar=null;
    else
        $ocultar="display:none";
}
else{
    $usuario=new Usuario;
    $ocultar="display:none";
    }
$this->widget('bootstrap.widgets.BsNavbar', array(
    'collapse' => true,
    'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_FIRE).BsHtml::bold(' WorkShop').BsHtml::small(' Qualitatcorp'),
    'brandUrl' => Yii::app()->homeUrl,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.BsNav',
            'type' => 'navbar',
            'activateParents' => true,
            'items' => array(
                array(
                    'label' => 'Usuario',
                    'visible'=>$usuario->usu_rol=="admins",
                    'items' => array(
                        BsHtml::menuHeader(BsHtml::italics('Usuarios',$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'))),
                        array(
                            'label' => 'Administar Usuarios',
                            'url' => array(
                                'usuario/admin'
                            ),
                        ),
                        array(
                            'label' => 'Crear Usuario',
                            'url' => array(
                                'usuario/create'
                            ),
                        ),
                        array(
                            'label' => 'Registros de ingreso',
                            'url' => array(
                                'usuario/records'
                            ),
                        ),

                    )
                ),
                array(
                    'label' => 'Empresa',
                    'visible'=>$usuario->usu_rol=="admins",
                    'items' => array(
                        BsHtml::menuHeader(BsHtml::italics('Empresa',$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;')), array(
                            // 'class' => 'text-center',
                            // 'style' => 'color:#99cc32;font-size:32px;'
                        )),
                        array(
                            'label' => 'Administrar Empresas',
                            'url' => array(
                                'empresa/admin'
                            )
                        ),
                        array(
                            'label' => 'Crear Empresa',
                            'url' => array(
                                'empresa/create'
                            )
                        ),
                        BsHtml::menuDivider(),
                        BsHtml::menuHeader(BsHtml::italics('Área Operativa',$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'))),
                        array(
                            'label' => 'Administrar área Operativa',
                            'url' => array(
                                'empresa/areaoperativa'
                            )
                        ),
                        array(
                            'label' => 'Crear área operativa',
                            'url' => array(
                                'empresa/createAO'
                            )
                        ),
                        BsHtml::menuDivider(),
                        BsHtml::menuHeader(BsHtml::italics('Tipo de Empresa',$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'))),
                        array(
                            'label' => 'Tipo Empresa',
                            'url' => array(
                                'empresa/tipoempresa'
                            )
                        ),
                        array(
                            'label' => 'Crear Empresa',
                            'url' => array(
                                'empresa/createTE'
                            )
                        ),

                    )
                ),
                array(
                	'label'=>'Teléfono',
                    'visible'=>$usuario->usu_rol=="admins",
                    'items' => array(
                        BsHtml::menuHeader(BsHtml::italics('Teléfono',$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'))
                            // ,$htmlOptions=array('style'=>$ocultar)
                            ),
                        array(
                            'label' => 'Administrar Teléfonos',
                            'url' => array(
                                'telefono/admin'
                            ),
                            // 'visible'=>$usuario->usu_rol=="admins",
                        ),
                        array(
                            'label' => 'Crear Teléfono',
                            'url' => array(
                                'telefono/create'
                            ),
                            // 'visible'=>$usuario->usu_rol=="admins",
                        ),
                        BsHtml::menuDivider(//$htmlOptions=array('style'=>$ocultar)
                            ),
                        BsHtml::menuHeader(BsHtml::italics('Licencias de uso',$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'))),
                        array(
                            'label' => 'Administrar Licencias',
                            'url' => array(
                                'telefono/licencia'
                            )
                        ),
                        array(
                            'label' => 'Recargar licencia',
                            'url' => array(
                                'telefono/createLI'
                            )
                        ),
                        array(
                            'label' => 'Listado Recargas',
                            'url' => array(
                                'telefono/recargas'
                            )
                        ),
                    )
                ),
                array(
                	'label'=>'Pregunta',
                    'visible'=>$usuario->usu_rol=="admins",
                    'items' => array(
                        BsHtml::menuDivider(),
                        BsHtml::menuHeader(BsHtml::italics('Preguntas',
                            $htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'))),
                        // BsHtml::menuDivider(),
                        array(
                			'label'=>'Administrar Preguntas',
                            'url' => array(
                                'pregunta/admin'
                            )
                        ),
                        array(
                            'label'=>'Registrar Preguntas',
                            'url' => array(
                                'pregunta/create'
                            )
                        ),
                        BsHtml::menuDivider(),
                        BsHtml::menuHeader(BsHtml::italics('Tipo de Preguntas',
                            $htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'))),
                        array(
                            'label'=>'Administrar Tipos de Preguntas',
                            'url' => array(
                                '//tipopregunta/admin'
                            )
                        ),
                        array(
                            'label'=>'Registrar Tipo de Pregunta',
                            'url' => array(
                                '//tipopregunta/create'
                            )
                        ),
                    )
                ),
                array(
                	'label'=>'Evaluaciones',
                    'items' => array(
                        BsHtml::menuHeader(BsHtml::italics('Evaluaciones')
                            ,$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;')),

                            array(
                                'label' => 'Administrar Evaluaciones',
                                'url' => array('evaluacion/admin')
                                ),
                            BsHtml::menuDivider($htmlOptions=array('style'=>$ocultar)),
                            BsHtml::menuHeader(BsHtml::italics('Tipo de Evaluaciones')
                                ,$htmlOptions=array('style'=> 'font-size:110%;text-decoration: underline;font-weight:bold;'.$ocultar)),
                            array(
                                'label' => 'Administrar tipo Evaluaciones',
                                'url' => array('tipoevaluacion/admin'),
                                'visible'=>$usuario->usu_rol=="admins"
                                ),
                            array(
                                'label' => 'Registrar tipo Evaluación',
                                'url' => array('tipoevaluacion/create'),
                                'visible'=>$usuario->usu_rol=="admins"
                                ),

                    )
                ),

            )
        ),
        array(
            'class' => 'bootstrap.widgets.BsNav',
            'type' => 'navbar',
            'activateParents' => true,
            'items' => array(
                array(
                    'label' => 'Login',
                    'url' => array(
                        '/usuario/login'
                    ),
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Logout (' . Yii::app()->user->name . ')',
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'url' => array(
                        '/usuario/logout'
                    ),
                    'visible' => !Yii::app()->user->isGuest
                )
            ),
            'htmlOptions' => array(
                'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT
            )
        )
        
    )
));
?>
		 <?php 
		// breadcrumbs
			$this->widget('bootstrap.widgets.BsBreadCrumb', array(
				'links' => $this->breadcrumbs,
				// will change the container to ul
				'tagName' => 'ul',
				// will generate the clickable breadcrumb links
				'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
				// will generate the current page url : <li>News</li>
				'inactiveLinkTemplate' => '<li>{label}</li>',
				// will generate your homeurl item : <li><a href="/dr/dr/public_html/">Home</a></li>
				'homeLink' => BsHtml::openTag('li') . BsHtml::icon(BsHtml::GLYPHICON_HOME) . BsHtml::closeTag('li')
			));
	?>
<div class="content">
	<?php echo $content ?>
</div>
</div>

</body>
</html>