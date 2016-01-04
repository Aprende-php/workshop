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
				'actions'=>array('admin','deleted','deleteLI'),
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
	public function actionupdate()
	{
		$model=Telefono::model()->findByAttributes(array('emp_rut'=>$_GET['rut'],'tel_numero'=>$_GET['tel']));
		if(isset($_POST['Telefono'])){
			$model->attributes=$_POST['Telefono'];
			if($model->save())
				$this->redirect(array('admin'));
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}
	public function actiondeleted()
	{
		$model=Telefono::model()->findByAttributes(array('emp_rut'=>$_GET['rut'],'tel_numero'=>$_GET['tel']));
		$model->tel_desabilitado=1;
		$model->save();
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
/** 
	Licencia y recargas
*/
	public function actionlicencia()
	{
		$List=Licencia::model()->findAll('lic_desabilitado=0');
		$this->render('adminLI',array(
			'List'=>$List,
		));
	}
	public function actioncreateLI()
	{
		$model=new Licencia;
		if(isset($_POST['Licencia'])){
			$model->attributes=$_POST['Licencia'];
			if($model2=Licencia::model()->findByAttributes(array('emp_rut'=>$_POST['Licencia']['emp_rut']))){
				$suma=$model->lic_usos;
				$model=$model2;
				$model->lic_usos+=$suma;
			}
			if($model->save())
				$this->redirect(array('licencia'));
		}
		$this->render('createLI',array(
			'model'=>$model,
		));
	}	
	public function actionupdateLI($id)
	{
		$model=Licencia::model()->findByPk($id);
		if(isset($_POST['Licencia'])){
			$model->attributes=$_POST['Licencia'];
			if($model->save())
				$this->redirect(array('licencia'));
		}
		$this->render('updateLI',array(
			'model'=>$model,
		));
	}

	public function actiondeleteLI($id)
	{
		$model=Licencia::model()->findByPk($id);
		$model->lic_desabilitado=1;
		$model->save();
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('licencia'));
	}



}