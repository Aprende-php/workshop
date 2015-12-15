<?php
$this->breadcrumbs=array(
    'Administar Área Operativa'=>array('areaoperativa'),
    'Modificar',
);?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
      
<?= BsHtml::pageHeader('Modificar área operativa', 'Empresa') ?>
<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableClientValidation'=>true,
)); ?>
    <p class="help-block">Los campos con un <span class="required">*</span> son requeridos.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldControlGroup($model,'are_nombre',array('required'=>'required','autofocus'=>'autofocus'))?>
    <?php echo BsHtml::formActions(array(BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY))));?>
<?php $this->endWidget(); ?>
  </div>
</div>