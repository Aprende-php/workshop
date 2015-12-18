<?php

class TelefonoController extends Controller
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
				'actions'=>array(),
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
	Telefono
*/

	public function actionadmin()
	{
		$List=Telefono::model()->findAll('tel_desabilitado=0');
		$this->render('admin',array(
			'List'=>$List,
		));
	}
	public function actioncreate()
	{
		$model=new Telefono;
		if(isset($_POST['Telefono'])){
			$model->attributes=$_POST['Telefono'];
			if($model->save())
				$this->redirect(array('admin'));
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}	
	public function actionupdate($id)
	{
		$model=Telefono::model()->findByPk($id);
		if(isset($_POST['Telefono'])){
			$model->attributes=$_POST['Telefono'];
			if($model->save())
				$this->redirect(array('admin'));
		}
		$this->render('updateTE',array(
			'model'=>$model,
		));
	}
	public function actiondelete($id)
	{
		$model=Telefono::model()->findByPk($id);
		$model->tem_desabilitado=1;
		$model->save();
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('tipoempresa'));
	}
	
/** 
	Licencia
*/
	public function actionlicencia()
	{
		$List=AreaOperativa::model()->findAll('are_desabilitado=0');
		$this->render('adminAreaOperativa',array(
			'List'=>$List,
		));
	}
	public function actioncreateLI()
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
	public function actionupdateLI($id)
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
	public function actiondeleteLI($id)
	{
		$model=AreaOperativa::model()->findByPk($id);
		$model->are_desabilitado=1;
		$model->save();
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('areaoperativa'));
	}

// /**
// 	Empresa
// */

// 	public function actionCreate()
// 	{
// 		$model=new Empresa;
// 		if(isset($_POST['Empresa']))
// 		{
// 			$model->attributes=$_POST['Empresa'];
// 			if($model->save())
// 				$this->redirect(array('admin'));
// 		}

// 		$this->render('create',array(
// 		'model'=>$model,
// 		));
// 	}

// 	public function actionUpdate()
// 	{
// 		$id=$_GET['rut'];
// 		$model=Empresa::model()->findByPk($id);
// 		if(isset($_POST['Empresa']))
// 		{
// 			$model->attributes=$_POST['Empresa'];
// 			if($model->save())
// 				$this->redirect(array('admin'));
// 		}

// 		$this->render('update',array(
// 			'model'=>$model,
// 		));
// 	}

// 	public function actionDeleteE()
// 	{
// 		$id=$_GET['rut'];
// 		$model=Empresa::model()->findByPk($id);
// 		$model->emp_desabilitado=1;
// 		$model->save();
// 		$this->redirect(array('admin'));
// 	}

// 	public function actionIndex()
// 	{
// 		$dataProvider=new CActiveDataProvider('Empresa');
// 		$this->render('index',array(
// 			'dataProvider'=>$dataProvider,
// 		));
// 	}

// 	public function actionAdmin()
// 	{
// 		$List=Empresa::model()->findAll('emp_desabilitado=0');
// 		$this->render('admin',array(
// 			'List'=>$List,
// 		));
// 	}
}