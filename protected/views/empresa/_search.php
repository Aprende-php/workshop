<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'emp_rut',array('maxlength'=>13)); ?>
    <?php echo $form->textFieldControlGroup($model,'tem_id',array('maxlength'=>10)); ?>
    <?php echo $form->textFieldControlGroup($model,'are_id',array('maxlength'=>10)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_nombre',array('maxlength'=>256)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_direccion',array('maxlength'=>512)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_fono',array('maxlength'=>64)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_email',array('maxlength'=>256)); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_fecha_creacion'); ?>
    <?php echo $form->textFieldControlGroup($model,'emp_desabilitado'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
