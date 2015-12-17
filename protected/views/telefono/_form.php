<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'layout' => BsHtml::FORM_LAYOUT_HORIZONTAL,
    'enableClientValidation'=>true,
)); ?>

    <p class="help-block">Los campos con un <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->dropDownListControlGroup($model, 'emp_rut', CHtml::listData(Empresa::model()->findAll('emp_desabilitado=0'),'emp_rut', 'emp_nombre'), array('empty' => 'Seleccione una Empresa'));?>
    <?php echo $form->dropDownListControlGroup($model, 'com_id', CHtml::listData(Compania::model()->findAll('com_desabilitado=0'),'com_id', 'com_nombre'), array('empty' => 'Seleccione una Compañia'));?>

    <?php echo $form->textFieldControlGroup($model,'tel_mac'); ?>
    <?php echo $form->textFieldControlGroup($model,'tel_numero'); ?>  
    <?php echo $form->dropDownListControlGroup($model, 'tel_activado',array('No','Si'), array('empty' => 'Seleccione un Opcion'));?>


    <?php echo BsHtml::formActions(array(BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY))));?>

<?php $this->endWidget(); ?>