<?php

/**
 * This is the model class for table "licencia".
 *
 * The followings are the available columns in table 'licencia':
 * @property string $lic_id
 * @property string $emp_rut
 * @property string $lic_usos
 * @property string $lic_fecha_creacion
 * @property integer $lic_desabilitado
 */
class Licencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'licencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_rut, lic_usos', 'required'),
			array('lic_desabilitado', 'numerical', 'integerOnly'=>true),
			array('emp_rut', 'length', 'max'=>13),
			array('lic_usos', 'numerical','integerOnly'=>true,),
		);
	}
	public function attributeLabels()
	{
		return array(
			'lic_id' => 'Licencia',
			'emp_rut' => 'Empresa',
			'lic_usos' => '# Usos',
			'lic_fecha_creacion' => 'Fecha Creación',
			'lic_desabilitado' => 'Desabilitado',
		);
	}

	public function getemp_nombre()
	{
		return ($model=Empresa::model()->findByPk($this->emp_rut))?$model->emp_nombre:"SIN EMPRESA";
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
