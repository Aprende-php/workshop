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
                			'label'=>'Pregunta',
                            'url' => array(
                                '#'
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

<<<<<<< HEAD
<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Pregunta', 'url'=>array('/pregunta/admin')),
				array('label'=>'TipoPregunta', 'url'=>array('/tipopregunta/admin')),
				array('label'=>'TipoEvaluacion', 'url'=>array('/tipoevaluacion/admin')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
=======
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
>>>>>>> refs/remotes/origin/master

</body>
</html>