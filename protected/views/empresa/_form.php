<?php
$baseUrl=Yii::app()->baseUrl;
Yii::app()->getClientScript()
    ->registerScriptFile($baseUrl.'/js/jquery.Rut.min.js',CClientScript::POS_END)
    ->registerScript('ValidaRut', "$('#Empresa_emp_rut').Rut({
   on_error: function(){ alert('El rut ingresado es incorrecto'); }
})
");

?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableClientValidation'=>true,
)); ?>

    <p class="help-block">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'emp_rut',array('maxlength'=>13)); ?>
    <?php echo $form->dropDownListControlGroup($model, 'tem_id', CHtml::listData(TipoEmpresa::model()->findAll('tem_desabilitado=0'),'tem_id', 'tem_nombre'), array('empty' => 'Seleccione un tipo'));?>
    <?php echo $form->dropDownListControlGroup($model, 'are_id', CHtml::listData(AreaOperativa::model()->findAll('are_desabilitado=0'),'are_id', 'are_nombre'), array('empty' => 'Seleccione un Área'));?>
    <?php echo $form->textFieldControlGroup($model,'emp_nombre',array('maxlength'=>256)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_direccion',array('maxlength'=>512)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_fono',array('maxlength'=>64)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_email',array('maxlength'=>256)); ?>

    <?php echo BsHtml::formActions(array(BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY))));?>

<?php $this->endWidget(); ?>
