<?php 
  $stylesheet='
    <link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/mpdf.css" />
    <link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/bootstrap.cerulean.min.css" />
    <body>';

  $var=Evaluacion::model()->findByPk($_GET['id']);//  Contiene datos de la Evaluacion a  imprimir
  $var2=EvaluacionPregunta::model()->findAllByAttributes(array('eva_id'=>$var->eva_id));// datos de las respuestas a la evaluacion a imprimir
  $var3;
  foreach ($var2 as $key => $value)
    $var3[$key]=Pregunta::model()->findByPk($value->pre_id);
  $table="";
  foreach ($var2 as $key => $value) {
      $respuesta="";
      if($value->pre_respuesta)
          $respuesta="SI";
      else
          $respuesta="NO";
      $table.=
    "<tr><td>".("<center>".BsHtml::bold(($key+"1"),
            $htmlOptions=array('style'=>'font-size:110%;color:#000;')))."</td>
    <td>".("<center>".BsHtml::imageThumbnail(Yii::app()->request->baseUrl."/images/pregunta/".str_replace("/upload/preguntas/default/",'', $var3[$key]->pre_imagen),'',$htmlOptions = array(
        'style'=> 'width: 110px; height: 110px;margin-top: 5px;margin-bottom: 5px;border:1px solid #dddddd;')))."</td>
    <td>". ("<center>".BsHtml::bold($var3[$key]->pre_descripcion,
            $htmlOptions=array('style'=>'font-size:110%;color:#000;'))."<br>".BsHtml::italics('"'.$var3[$key]->pre_comentario.'"',
            $htmlOptions=array('style'=>'font-size:90%;')))."</td>
    <td>".("<center>".BsHtml::bold($var3[$key]->tpr_nombre,
            $htmlOptions=array('style'=>'font-size:110%;color:#000;')))."</td>
    <td>". ("<center>".BsHtml::bold($respuesta,
            $htmlOptions=array('style'=>'font-size:110%;color:#000;')))."</td></tr>";
  }



// $header= BsHtml::pageHeader("Informe - Evaluación","<br>" .$var['emp_nombre']." - "."Usuario ".$var['usu_rut']);
$html=
'<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th style="width:20px"><center>#</th>
      <th style="width:150px"><center>Imagen</th>
      <th><center>Descripción</th>
      <th style="width:90px"><center>Tipo Pregunta</th>
      <th style="width:80px"><center>Respuesta</th>
    </tr>
  </thead>
  <tbody>'.
   $table
  .'</tbody>
  <tfoot>
  </tfoot>
  </table>
';


$logo='<div class="row">'.'<img src="'.Yii::app()->request->baseUrl.'/images/Qualitat.jpg" height="120px" width="240px">'.
BsHtml::pageHeader("Informe - Evaluación","<br>" .$var['emp_nombre']." - "."Usuario ".$var['usu_rut'],$htmlOptions=array(
  'style'=>'position: relative;
      padding-top: -150px;
      padding-left: 280px;')).'</div>';

$pdf = Yii::createComponent('application.extensions.MPDF.mpdf');
$mpdf=new mPDF('A4','LETTER','',10,10,5,10,12,5,7);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($logo);
$mpdf->WriteHTML($html);

$mpdf->Output('Evaluacion'.'.pdf','I');
exit;





?>
