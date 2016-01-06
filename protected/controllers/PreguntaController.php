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
		$model=new Pregunta;
		$aux=null;	
		$var=null;	
		$var2=null;
		$id=true;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Pregunta']))
		{	
			$model->attributes=$_POST['Pregunta'];
			if (explode("/",$_FILES['Pregunta']['type']['pre_imagen'])[0]=="image")
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
				if ($model->pre_imagen!=null) {
					$aux=$_FILES['Pregunta']['name']['pre_imagen'];
					$var='1';
				}
			}
			if ($model->pre_imagen!=null&&$var!=null){
				$model->pre_imagen->saveAs('images/pregunta/'.$aux);
				$model->pre_imagen=$aux;
				if($model->save())
					$this->redirect(array('admin'));
				else
					unlink('images/pregunta/'.$aux);
			}
			else
				$id=false;
		}

		$this->render('create',array(
			'model'=>$model,
			'id'=>$id,
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
		$id=true;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$aux=$model->pre_imagen;	// Guarda el valor de la imagen antes de recibir datos del formulario		
		if(isset($_POST['Pregunta']))
		{
			$model->attributes=$_POST['Pregunta'];
			if (explode("/",$_FILES['Pregunta']['type']['pre_imagen'])[0]=="image")
				$model->pre_imagen=CUploadedFile::getInstance($model,'pre_imagen');
			else
				if (explode("/",$_FILES['Pregunta']['type']['pre_imagen'])[0]!=null) {
					$id=false;
				}
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
				$model->pre_imagen=$aux;
				if($model->save())
					$this->redirect(array('admin'));
				else
					unlink('images/pregunta/'.$aux);
			}
			else{
				if ($model->pre_imagen!=null&&$id==true) {
					if($model->save())
					$this->redirect(array('admin'));
				}
				$id=false;
			}
		}
		$this->render('update',array(
			'model'=>$model,
			'id'=>$id,

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
		$model->pre_desabilitado=1;
		$model->save();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pregunta('search');
		$model->unsetAttributes();  // clear any default values
		$model->pre_desabilitado=0;
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
        		'label' => 'Editar',
        		'url' => array('update', 'id'=>$data->pre_id)
    		),
    		array(
        		'label' => 'Eliminar',
        		'url' => '#','linkOptions'=>array('submit'=>array('delete','id'=>$data->pre_id),'confirm'=>'Esta seguro de borrar este item?')
    		),
			), array(
    			'split' => false,
    			'size' => BsHtml::BUTTON_SIZE_SMALL,
    			'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    			'icon'=>BsHtml::GLYPHICON_COG,
			));
		}

		public function renderImage($data, $row) {
			echo BsHtml::imageThumbnail(
				Yii::app()->request->baseUrl."/images/pregunta/".str_replace("/upload/preguntas/default/",'', $data->pre_imagen),'',$htmlOptions = array(
					'style'=> 'width: 110px; height: 110px;border-radius: 15px;margin-top: 5px;'));
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
