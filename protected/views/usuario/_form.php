<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'usuario-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'usu_rut',array('maxlength'=>13)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_rut',array('maxlength'=>13)); ?>
    <?php echo $form->textFieldControlGroup($model,'car_id',array('maxlength'=>10)); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_nombre',array('maxlength'=>256)); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_apellido',array('maxlength'=>512)); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_password',array('maxlength'=>128)); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_rol',array('maxlength'=>32)); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_fono',array('maxlength'=>64)); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_email',array('maxlength'=>256)); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_fecha_creacion'); ?>
    <?php echo $form->textFieldControlGroup($model,'usu_desabilitado'); ?>

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
