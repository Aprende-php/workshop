<?php 

$pdf = Yii::createComponent('application.extensions.MPDF.mpdf');
$html='
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/bootstrap.css" />
<body>
  <h1><P ALIGN=center>A wild PDF is appear, you will go to fight?</h1>';
$html.='
 <table class="table table-striped table-condensed table-bordered">
      <thead>
        <tr>
          <th>Datos %%</th>
          <th>Datos %%</th>
          <th>Datos %%</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center">'."Datos #".'</td>
          <td align="center"><P ALIGN=center>Datos!!</td>
        </tr>
        <tr>
          <td align="center">'."Datos #".'</td>
          <td align="center">Datos!!</td>
        </tr>
        <tr>
          <td align="center">'."Datos #".'</td>
          <td align="center">Datos!!</td>
        </tr>
        <tr>
          <td align="center">'."Datos #".'</td>
          <td align="center">Datos!!</td>
        </tr>
      </tbody>
    </table>
</body>
';

$header='<div><center><img src="'.Yii::app()->request->baseUrl.'/images/pregunta/c.jpg"/ height="100%" width="100%"></center></div>';
$mpdf=new mPDF('A4','LETTER','',10,10,5,10,12,5,7);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html);
// $mpdf->WriteHTML($header);

$mpdf->Output('Evaluacion'.'.pdf','I');
exit;
?>
