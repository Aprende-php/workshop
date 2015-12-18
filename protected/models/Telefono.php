<?php

/**
 * This is the model class for table "telefono".
 *
 * The followings are the available columns in table 'telefono':
 * @property string $tel_numero
 * @property string $emp_rut
 * @property string $com_id
 * @property string $tel_mac
 * @property integer $tel_activado
 * @property string $tel_fecha_creacion
 * @property integer $tel_desabilitado
 */
class Telefono extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'telefono';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tel_numero, emp_rut, com_id, tel_mac, tel_fecha_creacion', 'required'),
			array('tel_activado, tel_desabilitado', 'numerical', 'integerOnly'=>true),
			array('tel_numero', 'length', 'max'=>32),
			array('emp_rut', 'length', 'max'=>13),
			array('com_id', 'length', 'max'=>10),
			array('tel_mac', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tel_numero, emp_rut, com_id, tel_mac, tel_activado, tel_fecha_creacion, tel_desabilitado', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'tel_numero' => 'Numero',
			'emp_rut' => 'Empresa',
			'com_id' => 'Compañia',
			'tel_mac' => 'MAC',
			'tel_activado' => 'Activado',
			'tel_fecha_creacion' => 'Tel Fecha Creación',
			'tel_desabilitado' => 'Desabilitado',
		);
	}

	public function getcom_nombre()
	{
		return Compania::model()->findByPk($this->com_id)->com_nombre;
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
