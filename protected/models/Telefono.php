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

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tel_numero' => 'Tel Numero',
			'emp_rut' => 'Emp Rut',
			'com_id' => 'Com',
			'tel_mac' => 'Tel Mac',
			'tel_activado' => 'Tel Activado',
			'tel_fecha_creacion' => 'Tel Fecha Creacion',
			'tel_desabilitado' => 'Tel Desabilitado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tel_numero',$this->tel_numero,true);
		$criteria->compare('emp_rut',$this->emp_rut,true);
		$criteria->compare('com_id',$this->com_id,true);
		$criteria->compare('tel_mac',$this->tel_mac,true);
		$criteria->compare('tel_activado',$this->tel_activado);
		$criteria->compare('tel_fecha_creacion',$this->tel_fecha_creacion,true);
		$criteria->compare('tel_desabilitado',$this->tel_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Telefono the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
