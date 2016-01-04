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
				'actions'=>array('create','update','admin','delete','pdf','excel'),
				'users'=>array('@'),
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
	// public function actionAdmin()
	// {
	// 	$List=Evaluacion::model()->findAll('eva_desabilitado=0');
	// 	$this->render('admin',array(
	// 		'List'=>$List,
	// 	));
	// }
		public function actionAdmin()
	{
		$model=new Evaluacion('search');
		$model->unsetAttributes();  // clear any default values
		$model->eva_desabilitado=0;
		if(isset($_GET['Evaluacion'])){
			$model->attributes=$_GET['Evaluacion'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	// public function behaviors()
 //    {
 //        return array(
 //            // 'eexcelview'=>array(
 //                // 'class'=>'ext.eexcelview.EExcelBehavior',
 //            // ),
 //        );
 //    }

	public function renderButtons($data) {
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

    public function actionExcel()
{
    Yii::import('ext.phpexcel.XPHPExcel');      
	$objPHPExcel = XPHPExcel::createPHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
								 ->setLastModifiedBy("Maarten Balliauw")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("")
								 ->setCategory("");
	$var=Evaluacion::model()->findAll();//  Contiene datos de la Evaluacion a  imprimir
	foreach ($var as $key => $value) {
  		$var2=EvaluacionPregunta::model()->findAllByAttributes(array('eva_id'=>$value->eva_id));// datos de las respuestas a la evaluacion a imprimir
	    $objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('A'.($key+2), ($key+1))
	            ->setCellValue('B'.($key+2), $value->eva_fecha)
	            ->setCellValue('C'.($key+2), $value->usu_rut)
	            ->setCellValue('D'.($key+2), $value->emp_rut)
	            ->setCellValue('E'.($key+2), $value->emp_nombre);
	            // ->setCellValue('F'.($key+2), $fono->tel_numero);
	            // ->setCellValue('G'.($key+2), $fono->tel->mac);
	    $c=7;
	    $k=0;
	    $j=null;
    foreach ($var2 as $key2 => $value2)
	    {
	    	if (Pregunta::model()->findByPk($value2->pre_id)!=null)
	    	{
	    		$descripcion=Pregunta::model()->findByPk($value2->pre_id)->pre_descripcion;
	    		if($value2->pre_respuesta)
          			$respuesta="SI";
      			else
         			$respuesta="NO";	
	    	}
	    	else
	    		$descripcion="Sin resultados";
	    	if ($c+$key2>25) {
				$j=intval(($c+$key2)/26);
				$k= ($c+$key2)%26;
			}
			if ($j==null)
				{
					$objPHPExcel->setActiveSheetIndex(0)
		           	 			->setCellValue(chr($key2+65+$c).($key+2),$descripcion);
				}
			else
					$objPHPExcel->setActiveSheetIndex(0)
		        		    	->setCellValue(chr($j+64).chr($k+65).($key+2),$descripcion);
		    $c++;
		    if ($c+$key2>25) {
				$j=intval(($c+$key2)/26);
				$k= ($c+$key2)%26;
			}
			if ($j==null)
				{
					$objPHPExcel->setActiveSheetIndex(0)
		           	 			->setCellValue(chr($key2+65+$c).($key+2),$respuesta);
				}
			else
					$objPHPExcel->setActiveSheetIndex(0)
		        		    	->setCellValue(chr($j+64).chr($k+65).($key+2),$respuesta);
	    }
		
	}
	$j=null;
	$k=0;
	$c=1;
	for ($i=7;$i<87;$i++) {
		if ($i>25) {
			$j=intval($i/26);
			$k=$i-intval($i/26)*26;
		}
		if ($i%2!=0) {
			if ($j==null) {
				$objPHPExcel->setActiveSheetIndex(0)
		           	 		->setCellValue(chr($i+65).'1',"P".$c);
			}
			else
				$objPHPExcel->setActiveSheetIndex(0)
		        		    ->setCellValue(chr($j+64).chr($k+65).'1',"P".$c);
		}
		else
		{
			if ($j==null) {
				$objPHPExcel->setActiveSheetIndex(0)
		           	 		->setCellValue(chr($i+65).'1',"R".($c));
		        $c++;
			}
			else{

				$objPHPExcel->setActiveSheetIndex(0)
		        		    ->setCellValue(chr($j+64).chr($k+65).'1',"R".$c);
		       	$c++;
				}
		
		}
	}
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('A1', 'N°')
	            ->setCellValue('B1', 'fecha')
	            ->setCellValue('C1', 'Usuario')
	            ->setCellValue('D1', 'Rut Empresa')
	            ->setCellValue('E1', 'Empresa')
	            ->setCellValue('F1', 'N° Telefono!')
	            ->setCellValue('G1', 'Mac Telefono');

	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('Simple');


	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);


	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="informe.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
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