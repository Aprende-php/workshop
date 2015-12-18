<?php

class EvaluacionController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','pdf'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Evaluacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->eva_id));
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

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->eva_id));
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
		$model= Evaluacion::model()->findByPk($id);
		$model->eva_desabilitado=1;
		$model->save();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Evaluacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$List=Evaluacion::model()->findAll('eva_desabilitado=0');
		$this->render('admin',array(
			'List'=>$List,
		));
	}

	public function renderButtons($data, $row) {
   		echo BsHtml::buttonDropdown('', array(
    		array(
        		'label' => 'Editar',
        		'url' => array('update', 'id'=>$data->eva_id)
    		),
    		array(
        		'label' => 'Eliminar',
        		'url' => '#','linkOptions'=>array('submit'=>array('delete','id'=>$data->eva_id),'confirm'=>'Esta seguro de borrar este item?')
    		),
    		array(
        		'label' => 'Infome en PDF',
        		// 'url' => CHtml::normalizeUrl(array('pdf','id'=>$data->eva_id)),
        		'url'=>'',
        		'onclick'=>"window.open(href='pdf?id=$data->eva_id')",
        		// window.open(URL,"ventana1","width=120,height=300,scrollbars=NO") 
        		// $htmlOptions=array('target'=> '_blank')
        		// 'htmlOptions'=>array('target'=> '_blank')
    		),
			), array(
    			'split' => false,
    			'size' => BsHtml::BUTTON_SIZE_SMALL,
    			'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    			'icon'=>BsHtml::GLYPHICON_COG,
			));
		}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evaluacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evaluacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	 public function actionPdf($id=null)
    {
        $this->render('pdf'
        );
    }

	/**
	 * Performs the AJAX validation.
	 * @param Evaluacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}