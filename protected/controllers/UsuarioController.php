<?php

class UsuarioController extends Controller
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
				'actions'=>array('index','view','login'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','deleted','records'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
/**
		Autentificacion de Usuario
*/	


public function actionLogin()
	{
		$this->layout='loginLayout';
		$model=new LoginForm;
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login',array('model'=>$model));
	}
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

/**
		Usuario
*/


	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new Usuario;

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save()){
				Yii::app()->user->setFlash('success', "Se ha guardado correctamente.");
				$this->redirect(array('admin'));
			}
			else 
				Yii::app()->user->setFlash('error', "No se logro guardar.");
		}

		$this->render('create',array(
		'model'=>$model,
		));
	}

	public function actionUpdate()
	{
		$model=Usuario::model()->findByPk($_GET['rut']);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			if($model->save()){
				Yii::app()->user->setFlash('success', "Se ha modificado correctamente.");
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDeleted()
	{
		$model=Usuario::model()->findByAttributes(array('usu_rut'=>$_GET['rut']));
		$model->usu_desabilitado=1;
		$model->save();
		Yii::app()->user->setFlash('success', "Se ha eliminado correctamente.");
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionAdmin()
	{
		$List = Yii::app()->db->createCommand()
			->select('usu_rut, usu_nombre, usu_fono,usu_email,car_nombre,emp_nombre')
			->from('usuario')
			->leftJoin('cargo', 'usuario.car_id=cargo.car_id')
			->leftJoin('empresa', 'usuario.emp_rut=empresa.emp_rut')
			->where('usu_desabilitado=0')
			->queryAll();
		$this->render('admin',array('List'=>$List));
	}

	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/** 
		Registros Sistema
	*/
	public function actionRecords()
	{
	$List = Yii::app()->db->createCommand()
		->select('*')
		->from('ingreso_sistema')
		// ->leftJoin('cargo', 'usuario.car_id=cargo.car_id')
		// ->leftJoin('empresa', 'usuario.emp_rut=empresa.emp_rut')
		// ->where('usu_desabilitado=0')
		->order('ing_fecha_ingreso desc')
		// ->limit(100)
		->queryAll();
		$this->render('records',array('List'=>$List));
	}
}