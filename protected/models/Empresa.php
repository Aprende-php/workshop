<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property string $emp_rut
 * @property string $tem_id
 * @property string $are_id
 * @property string $emp_nombre
 * @property string $emp_direccion
 * @property string $emp_fono
 * @property string $emp_email
 * @property string $emp_fecha_creacion
 * @property integer $emp_desabilitado
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_rut, tem_id, are_id, emp_nombre, emp_direccion, emp_fono, emp_email', 'required'),
			array('emp_desabilitado', 'numerical', 'integerOnly'=>true),
			array('emp_rut', 'length', 'max'=>13),
			array('tem_id, are_id', 'length', 'max'=>10),
			array('emp_nombre, emp_email', 'length', 'max'=>256),
			array('emp_direccion', 'length', 'max'=>512),
			array('emp_fono', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('emp_rut, tem_id, are_id, emp_nombre, emp_direccion, emp_fono, emp_email, emp_fecha_creacion, emp_desabilitado', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'emp_rut' => 'Rut',
			'tem_id' => 'Tipo',
			'are_id' => 'Area',
			'emp_nombre' => 'Nombre',
			'emp_direccion' => 'Dirección',
			'emp_fono' => 'Fono',
			'emp_email' => 'Email',
			'emp_fecha_creacion' => 'Fecha Creación',
			'emp_desabilitado' => 'Deshabilitado',
		);
	}

	public function gettem_nombre()
	{
		return TipoEmpresa::model()->findByPk($this->tem_id)->tem_nombre;
	}
	public function getare_nombre()
	{
		return AreaOperativa::model()->findByPk($this->are_id)->are_nombre;
	}
	public function gettel_count()
	{
		return Telefono::model()->count("emp_rut='$this->emp_rut'");
	}
	public function getlic_count()
	{
		return Licencia::model()->count("emp_rut='$this->emp_rut'");
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
