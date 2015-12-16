<?php

class PreguntaController extends Controller
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
				'actions'=>array('admin','delete'),
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
		$model=new Pregunta;
		$aux=null;	
		$var=null;	
		$var2=null;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		// basename($_FILES['Pregunta']['type']['pre_imagen']);
		if(isset($_POST['Pregunta']))
		{	
			$model->attributes=$_POST['Pregunta'];
			$model->pre_imagen=CUploadedFile::getInstance($model,'pre_imagen');

			if(is_file('images/pregunta/'.$model->pre_imagen)){	//Consulta si el nombre de imagen ingresada ya existe en servidor
					$var=explode(".",$model->pre_imagen);	// Guarda nombre de la imagen y extension en un arreglo
					$var2=explode("-copia-",$var[0]);	// Guarda nombre de la imagen y una extension "-copia-"
					for($i=0;$i<999;$i++){
						if(!is_file('images/pregunta/'.$var2[0]."-copia-".$i.".".$var[1])){
							$aux=$var2[0]."-copia-".$i.".".$var[1];	// Asigna un nombre a la imagen
							break;
						}
					}
				}
			else{
					$aux=$_FILES['Pregunta']['name']['pre_imagen'];
					$var='1';
				}
			if ($model->pre_imagen!=null&&$var!=null){
				$model->pre_imagen->saveAs('images/pregunta/'.$aux);
			}
			$model->pre_imagen=$aux;
			if($model->save())
				$this->redirect(array('view','id'=>$model->pre_id));
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
		$aux=null;	
		$var=null;	
		$var2=null;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$aux=$model->pre_imagen;	// Guarda el valor de la imagen antes de recibir datos del formulario		
		if(isset($_POST['Pregunta']))
		{
			$model->attributes=$_POST['Pregunta'];
			$model->pre_imagen=CUploadedFile::getInstance($model,'pre_imagen');
			if ($model->pre_imagen==null&&$aux!=null)	// Verifica si no se ingreso una nueva imagen por formulario
				$model->pre_imagen=$aux;
			else{
				if(is_file('images/pregunta/'.$model->pre_imagen)){	//Consulta si el nombre de imagen ingresada ya existe en servidor
					$var=explode(".",$model->pre_imagen);	// Guarda nombre de la imagen y extension en un arreglo
					$var2=explode("-copia-",$var[0]);	// Guarda nombre de la imagen y una extension "-copia-"
					for($i=0;$i<999;$i++){
						if(!is_file('images/pregunta/'.$var2[0]."-copia-".$i.".".$var[1])){
							$aux=$var2[0]."-copia-".$i.".".$var[1];	// Asigna un nombre a la imagen
							break;
						}
					}
				}
				else{
					$aux=$_FILES['Pregunta']['name']['pre_imagen'];
					$var='1';
				}
			}
			if ($model->pre_imagen!=null&&$var!=null){
				$model->pre_imagen->saveAs('images/pregunta/'.$aux);
			}
			$model->pre_imagen=$aux;
			if($model->save())
				$this->redirect(array('view','id'=>$model->pre_id));
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
		$model= Pregunta::model()->findByPk($id);
		$model->pre_desabilitado=0;
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
		$dataProvider=new CActiveDataProvider('Pregunta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pregunta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pregunta']))
			$model->attributes=$_GET['Pregunta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pregunta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pregunta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function renderButtons($data, $row) {
   		echo BsHtml::buttonDropdown('', array(
   			array(
        		'label' => 'Detalle',
        		'url' => array('view', 'id'=>$data->pre_id)
    		),
    		array(
        		'label' => 'Editar',
        		'url' => array('update', 'id'=>$data->pre_id)
    		),
    		array(
        		'label' => 'Eliminar',
        		'url' => '#','linkOptions'=>array('submit'=>array('delete','id'=>$data->pre_id),'confirm'=>'Esta seguro de borrar este item?')
    		),
    		BsHtml::menuDivider(),
    		array(
        		'label' => 'Lo que sea...',
        		'url' => '#'
    		)
			), array(
    			'split' => false,
    			'size' => BsHtml::BUTTON_SIZE_SMALL,
    			'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    			'icon'=>BsHtml::GLYPHICON_COG,
			));
		}

		public function renderImage($data, $row) {
			echo BsHtml::imageThumbnail(
				Yii::app()->request->baseUrl."/images/pregunta/".$data->pre_imagen,'',$htmlOptions = array(
					'style'=> 'width: 120px; height: 120px;border-radius: 15px;margin-top: 5px;'));
   			}


	/**
	 * Performs the AJAX validation.
	 * @param Pregunta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pregunta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
