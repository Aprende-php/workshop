<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableClientValidation'=>true,
)); ?>

    <p class="help-block">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->dropDownListControlGroup($model, 'emp_rut', CHtml::listData(Empresa::model()->findAll('emp_desabilitado=0'),'emp_rut', 'emp_nombre'), array('empty' => 'Seleccione una Empresa'));?>
    <?php echo $form->textFieldControlGroup($model,'lic_usos'); ?>
    <?php echo BsHtml::formActions(array(BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY))));?>

<?php $this->endWidget(); ?>