<?php

class TipoPreguntaController extends Controller
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
		if (!Yii::app()->user->isGuest) {
			$usuario=Usuario::model()->findByPk(Yii::app()->user->id);
			if ($usuario->usu_rol=="admins") {
				$permisos=array('update','admin','delete','create');
			}
			else
				$permisos=array('');
		}
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>$permisos,
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>$permisos,
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TipoPregunta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TipoPregunta']))
		{
			$model->attributes=$_POST['TipoPregunta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tpr_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TipoPregunta']))
		{
			$model->attributes=$_POST['TipoPregunta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tpr_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model= TipoPregunta::model()->findByPk($id);
		$model->tpr_desabilitado=1;
		$model->save();
		// $this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TipoPregunta('search');
		$model->unsetAttributes();  // clear any default values
		$model->tpr_desabilitado=0;
		if(isset($_GET['TipoPregunta']))
			$model->attributes=$_GET['TipoPregunta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TipoPregunta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TipoPregunta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function renderButtons($data, $row) {
   		echo BsHtml::buttonDropdown('', array(
    		array(
        		'label' => 'Editar',
        		'url' => array('update', 'id'=>$data->tpr_id)
    		),
    		array(
        		'label' => 'Eliminar',
        		'url' => '#','linkOptions'=>array('submit'=>array('delete','id'=>$data->tpr_id),'confirm'=>'Esta seguro de borrar este item?')
    		),
			), array(
    			'split' => false,
    			'size' => BsHtml::BUTTON_SIZE_SMALL,
    			'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    			'icon'=>BsHtml::GLYPHICON_COG,
			));
		}


	/**
	 * Performs the AJAX validation.
	 * @param TipoPregunta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tipo-pregunta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
