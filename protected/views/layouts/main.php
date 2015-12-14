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
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<div class="container">    <?php
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
                    'url' => array(
                        '#'
                    ),
                    'items' => array(
                        array(
                            'label' => 'Usuario',
                            'url' => array(
                                '#'
                            )
                        ),

                    )
                ),
                array(
                    'label' => 'Empresa',
                    'url' => array(
                        '#'
                    ),
                    'items' => array(
                        array(
                            'label' => 'Administrar Empresas',
                            'url' => array(
                                'empresa/admin'
                            )
                        ),
                        array(
                            'label' => 'Area Operativa',
                            'url' => array(
                                'empresa/areaoperativa'
                            )
                        ),
                        array(
                            'label' => 'Tipo Empresa',
                            'url' => array(
                                'empresa/tipoempresa'
                            )
                        ),

                    )
                ),
                array(
                	'label'=>'Licencia',
                    'url' => array(
                        '#'
                    ),
                    'items' => array(
                        array(
                			'label'=>'Licencia',
                            'url' => array(
                                '#'
                            )
                        ),

                    )
                ),
                array(
                	'label'=>'Pregunta',
                    'url' => array(
                        '#'
                    ),
                    'items' => array(
                        array(
                            'label'=>'Preguntas',
                            'htmlOptions' => array(
                                'style' =>  'font-size:130%;text-decoration: underline'
                                ),
                        ),
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
                        array(

                            'label'=>'Tipo de Preguntas',
                            'htmlOptions' => array(
                                'style' => 'font-size:130%;text-decoration: underline;'
                                // color:#2E9AFE
                                ),
                        ),
                        // BsHtml::menuDivider(),
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
                	'label'=>'Informes',
                    'url' => array(
                        '#'
                    ),
                    'items' => array(
                        array(
                			'label'=>'Informes',
                            'url' => array(
                                '#'
                            )
                        ),

                    )
                ),
                array(
                	'label'=>'Evaluaciones',
                    'url' => array(
                        '#'
                    ),
                    'items' => array(
                        array(
                			'label'=>'Evaluaciones',
                            'url' => array(
                                '#'
                            )
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
                    'label' => 'About',
                    'url' => array(
                        '/site/page',
                        'view' => 'about'
                    )
                ),
                array(
                    'label' => 'Contact',
                    'url' => array(
                        '/site/contact'
                    )
                ),
                array(
                    'label' => 'Login',
                    'url' => array(
                        '/site/login'
                    ),
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Logout (' . Yii::app()->user->name . ')',
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'url' => array(
                        '/site/logout'
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