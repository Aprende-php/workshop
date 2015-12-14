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
			array('emp_rut, tem_id, are_id, emp_nombre, emp_direccion, emp_fono, emp_email, emp_fecha_creacion', 'required'),
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
			'emp_rut' => 'Emp Rut',
			'tem_id' => 'Tem',
			'are_id' => 'Are',
			'emp_nombre' => 'Emp Nombre',
			'emp_direccion' => 'Emp Direccion',
			'emp_fono' => 'Emp Fono',
			'emp_email' => 'Emp Email',
			'emp_fecha_creacion' => 'Emp Fecha Creacion',
			'emp_desabilitado' => 'Emp Desabilitado',
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

		$criteria->compare('emp_rut',$this->emp_rut,true);
		$criteria->compare('tem_id',$this->tem_id,true);
		$criteria->compare('are_id',$this->are_id,true);
		$criteria->compare('emp_nombre',$this->emp_nombre,true);
		$criteria->compare('emp_direccion',$this->emp_direccion,true);
		$criteria->compare('emp_fono',$this->emp_fono,true);
		$criteria->compare('emp_email',$this->emp_email,true);
		$criteria->compare('emp_fecha_creacion',$this->emp_fecha_creacion,true);
		$criteria->compare('emp_desabilitado',$this->emp_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
