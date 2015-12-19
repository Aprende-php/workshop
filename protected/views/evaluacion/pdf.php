<?php 
  function Footer()
    {
        function Footer() // Pie de página
        {
        // Posición: a 1,5 cm del final
        $mpdf->SetY(-15);
        // Arial italic 8
        $mpdf->SetFont('Arial','I',8);
        /* Cell(ancho, alto, txt, border, ln, alineacion)
         * ancho=0, extiende el ancho de celda hasta el margen de la derecha
         * alto=10, altura de la celda a 10
         * txt= Texto a ser impreso dentro de la celda
         * border=T Pone margen en la posición Top (arriba) de la celda
         * ln=0 Indica dónde sigue el texto después de llamada a Cell(), en este caso con 0, enseguida de nuestro texto
         * alineación=C Texto alineado al centro
         */
        $mpdf->Cell(0,10,'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF','T',0,'C');
        }
    }
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
    <td>".("<center>".BsHtml::imageThumbnail(Yii::app()->request->baseUrl."/images/pregunta/".$var3[$key]->pre_imagen,'',$htmlOptions = array(
        'style'=> 'width: 120px; height: 120px;margin-top: 10px;margin-bottom: 10px;border:1px solid #dddddd;')))."</td>
    <td>". ("<center>".BsHtml::bold($var3[$key]->pre_descripcion,
            $htmlOptions=array('style'=>'font-size:110%;color:#000;'))."<br>".BsHtml::italics('"'.$var3[$key]->pre_comentario.'"',
            $htmlOptions=array('style'=>'font-size:90%;')))."</td>
    <td>".("<center>".BsHtml::bold($var3[$key]->tpr_nombre,
            $htmlOptions=array('style'=>'font-size:110%;color:#000;')))."</td>
    <td>". ("<center>".BsHtml::bold($respuesta,
            $htmlOptions=array('style'=>'font-size:110%;color:#000;')))."</td></tr>";
  }



$header= BsHtml::pageHeader("Informe - Evaluación","<br>" .$var['emp_nombre']." - "."Usuario ".$var['usu_rut']);
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


$logo='<img src="'.Yii::app()->request->baseUrl.'/images/Qualitat.jpg" height="100px" width="200px">';

$pdf = Yii::createComponent('application.extensions.MPDF.mpdf');
$mpdf=new mPDF('A4','LETTER','',10,10,5,10,12,5,7);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($logo);
$mpdf->WriteHTML($header);
$mpdf->WriteHTML($html);
$mpdf->Footer();

$mpdf->Output('Evaluacion'.'.pdf','I');
exit;





?>
