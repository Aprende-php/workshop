<?php

class EmpresaController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','areaoperativa','deleteE','createAO','deleteAO','updateAO','tipoempresa','createTE','updateTE','deleteTE'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
/** 
	Tipo Empresa
*/

	public function actionTipoEmpresa()
	{
		$List=TipoEmpresa::model()->findAll('tem_desabilitado=0');
		$this->render('adminTipoEmpresa',array(
			'List'=>$List,
		));
	}
	public function actioncreateTE()
	{
		$model=new TipoEmpresa;
		if(isset($_POST['TipoEmpresa'])){
			$model->attributes=$_POST['TipoEmpresa'];
			if($model->save())
				$this->redirect(array('tipoempresa'));
		}
		$this->render('createTE',array(
			'model'=>$model,
		));
	}	
	public function actionupdateTE($id)
	{
		$model=TipoEmpresa::model()->findByPk($id);
		if(isset($_POST['TipoEmpresa'])){
			$model->attributes=$_POST['TipoEmpresa'];
			if($model->save())
				$this->redirect(array('tipoempresa'));
		}
		$this->render('updateTE',array(
			'model'=>$model,
		));
	}
	public function actiondeleteTE($id)
	{
		$model=TipoEmpresa::model()->findByPk($id);
		$model->tem_desabilitado=1;
		$model->save();
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('tipoempresa'));
	}
	
/** 
	Area Operativa
*/
	public function actionAreaOperativa()
	{
		$List=AreaOperativa::model()->findAll('are_desabilitado=0');
		$this->render('adminAreaOperativa',array(
			'List'=>$List,
		));
	}
	public function actioncreateAO()
	{
		$model=new AreaOperativa;
		if(isset($_POST['AreaOperativa'])){
			$model->attributes=$_POST['AreaOperativa'];
			if($model->save())
				$this->redirect(array('areaoperativa'));
		}
		$this->render('createAO',array(
			'model'=>$model,
		));
	}	
	public function actionupdateAO($id)
	{
		$model=AreaOperativa::model()->findByPk($id);
		if(isset($_POST['AreaOperativa'])){
			$model->attributes=$_POST['AreaOperativa'];
			if($model->save())
				$this->redirect(array('areaoperativa'));
		}
		$this->render('updateAO',array(
			'model'=>$model,
		));
	}
	public function actiondeleteAO($id)
	{
		$model=AreaOperativa::model()->findByPk($id);
		$model->are_desabilitado=1;
		$model->save();
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('areaoperativa'));
	}

/**
	Empresa
*/

	public function actionCreate()
	{
		$model=new Empresa;
		if(isset($_POST['Empresa']))
		{
			$model->attributes=$_POST['Empresa'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
		'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$id=$_GET['rut'];
		$model=Empresa::model()->findByPk($id);
		if(isset($_POST['Empresa']))
		{
			$model->attributes=$_POST['Empresa'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDeleteE()
	{
		$id=$_GET['rut'];
		$model=Empresa::model()->findByPk($id);
		$model->emp_desabilitado=1;
		$model->save();
		$this->redirect(array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$List=Empresa::model()->findAll('emp_desabilitado=0');
		$this->render('admin',array(
			'List'=>$List,
		));
	}
}