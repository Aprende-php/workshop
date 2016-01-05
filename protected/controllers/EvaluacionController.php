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

		if (!Yii::app()->user->isGuest) {
			$usuario=Usuario::model()->findByPk(Yii::app()->user->id);
			// echo $usuario->usu_rol;
			if ($usuario->usu_rol=="admins") {
				$permisos=array('update','admin','delete','pdf','excel');
			}
			else{
				if($usuario->usu_rol=="users"){
					if(isset($_GET['id'])){
						if (Evaluacion::model()->findByPk($_GET['id'])->emp_rut==$usuario->emp_rut)
							$permisos=array('update','admin','pdf','delete','excel');
						else
							$permisos=array('admin');
					}
					else
						$permisos=array('admin','excel');
				}
				else{
					if ($usuario->usu_rol=="viewver"){
						if(isset($_GET['id'])){
							$permisos=array('admin','pdf');
						}
						else
							$permisos=array('admin');
					}
					else
						$permisos=array('');
				}
			}
		}
		else
			$permisos=array('');
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

	public function actionDelete($id)
	{
		$model= Evaluacion::model()->findByPk($id);
		$model->eva_desabilitado=1;
		$model->save();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

		public function actionAdmin()
	{
		$model=new Evaluacion('search');
		$model->unsetAttributes();  // clear any default values
		$model->eva_desabilitado=0;
		if (!Yii::app()->user->isGuest) {
			$user=Usuario::model()->findByPk(Yii::app()->user->id);
			if ($user->usu_rol=="users") 
				$model->emp_rut=$user->emp_rut;
			if ($user->usu_rol=="viewver") 
				$model->usu_rut=$user->usu_rut;
		}
		if(isset($_GET['Evaluacion'])){
			$model->attributes=$_GET['Evaluacion'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function renderButtons($data) {
   		echo BsHtml::buttonDropdown('', array(
    		array(
        		'label' => 'Editar',
        		'url' => array('update', 'id'=>$data->eva_id),
        		'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol!="viewver"
    		),
    		array(
        		'label' => 'Eliminar',
        		'url' => '#','linkOptions'=>array('submit'=>array('delete','id'=>$data->eva_id),'confirm'=>'Esta seguro de borrar este item?'),
        		'visible'=>Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol!="viewver"
    		),
    		array(
        		'label' => 'Infome en PDF',
        		'url'=>'',
        		'onclick'=>"window.open(href='pdf?id=$data->eva_id')",
    		),
			), array(
    			'split' => false,
    			'size' => BsHtml::BUTTON_SIZE_SMALL,
    			'color' => BsHtml::BUTTON_COLOR_PRIMARY,
    			'icon'=>BsHtml::GLYPHICON_COG,
			));
		}

	public function loadModel($id)
	{
		$model=Evaluacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
// Manejo de informes en PDF
	 public function actionPdf($id=null)
    {
        $this->render('pdf'
        );
    }

// Maneja los informes en excel
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
	if (Usuario::model()->findByPk(Yii::app()->user->id)->usu_rol=="admins")
		$var=Evaluacion::model()->findAll();//  Contiene datos de la Evaluacion a  imprimir
	else
		$var=Evaluacion::model()->findAllByAttributes(array('emp_rut'=>Usuario::model()->findByPk(Yii::app()->user->id)->emp_rut));
	foreach ($var as $key => $value) {
		if (Telefono::model()->findByAttributes(array('tel_numero'=>$value->tel_numero,'emp_rut'=>$value->emp_rut))!=null){
			$fono=Telefono::model()->findByAttributes(array('tel_numero'=>$value->tel_numero,'emp_rut'=>$value->emp_rut))->tel_mac;
		}
		else
			$fono=null;
  		$var2=EvaluacionPregunta::model()->findAllByAttributes(array('eva_id'=>$value->eva_id));// datos de las respuestas a la evaluacion a imprimir
	    $objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('A'.($key+2), ($key+1))
	            ->setCellValue('B'.($key+2), $value->eva_fecha)
	            ->setCellValue('C'.($key+2), $value->usu_rut)
	            ->setCellValue('D'.($key+2), $value->emp_rut)
	            ->setCellValue('E'.($key+2), $value->emp_nombre)
	            ->setCellValue('F'.($key+2), $value->tel_numero)
	            ->setCellValue('G'.($key+2), $fono);
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
	for ($i=7;$i<107;$i++) {
		if ($i>25) {
			$j=intval($i/26);
			$k=$i-intval($i/26)*26;
		}
		if ($i%2!=0) {
			if ($j==null) {
				$objPHPExcel->setActiveSheetIndex(0)
		           	 		->setCellValue(chr($i+65).'1',"Pregunta"." ".$c);
		        $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension(chr($i+65))->setWidth(50);
			}
			else{
				$objPHPExcel->setActiveSheetIndex(0)
		        		    ->setCellValue(chr($j+64).chr($k+65).'1',"Pregunta"." ".$c);
		        $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension(chr($j+64).chr($k+65))->setWidth(50);
				}
		}
		else
		{
			if ($j==null) {
				$objPHPExcel->setActiveSheetIndex(0)
		           	 		->setCellValue(chr($i+65).'1',"Respuesta"." ".($c));
		        $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension(chr($i+65))->setWidth(15);   	 		
		        $c++;
			}
			else{
				$objPHPExcel->setActiveSheetIndex(0)
		        		    ->setCellValue(chr($j+64).chr($k+65).'1',"Respuesta"." ".$c);
		        $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension(chr($j+64).chr($k+65))->setWidth(15);		    
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
	            ->setCellValue('F1', 'N° Telefono')
	            ->setCellValue('G1', 'Mac Telefono');
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('G')->setWidth(25);

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
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}