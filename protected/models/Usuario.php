<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $usu_rut
 * @property string $emp_rut
 * @property string $car_id
 * @property string $usu_nombre
 * @property string $usu_apellido
 * @property string $usu_password
 * @property string $usu_rol
 * @property string $usu_fono
 * @property string $usu_email
 * @property string $usu_fecha_creacion
 * @property integer $usu_desabilitado
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usu_rut, emp_rut, car_id, usu_nombre, usu_apellido, usu_password, usu_rol, usu_fono, usu_email, usu_fecha_creacion', 'required'),
			array('usu_desabilitado', 'numerical', 'integerOnly'=>true),
			array('usu_rut, emp_rut', 'length', 'max'=>13),
			array('car_id', 'length', 'max'=>10),
			array('usu_nombre, usu_email', 'length', 'max'=>256),
			array('usu_apellido', 'length', 'max'=>512),
			array('usu_password', 'length', 'max'=>128),
			array('usu_rol', 'length', 'max'=>32),
			array('usu_fono', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usu_rut, emp_rut, car_id, usu_nombre, usu_apellido, usu_password, usu_rol, usu_fono, usu_email, usu_fecha_creacion, usu_desabilitado', 'safe', 'on'=>'search'),
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
			'usu_rut' => 'Usu Rut',
			'emp_rut' => 'Emp Rut',
			'car_id' => 'Car',
			'usu_nombre' => 'Usu Nombre',
			'usu_apellido' => 'Usu Apellido',
			'usu_password' => 'Usu Password',
			'usu_rol' => 'Usu Rol',
			'usu_fono' => 'Usu Fono',
			'usu_email' => 'Usu Email',
			'usu_fecha_creacion' => 'Usu Fecha Creacion',
			'usu_desabilitado' => 'Usu Desabilitado',
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

		$criteria->compare('usu_rut',$this->usu_rut,true);
		$criteria->compare('emp_rut',$this->emp_rut,true);
		$criteria->compare('car_id',$this->car_id,true);
		$criteria->compare('usu_nombre',$this->usu_nombre,true);
		$criteria->compare('usu_apellido',$this->usu_apellido,true);
		$criteria->compare('usu_password',$this->usu_password,true);
		$criteria->compare('usu_rol',$this->usu_rol,true);
		$criteria->compare('usu_fono',$this->usu_fono,true);
		$criteria->compare('usu_email',$this->usu_email,true);
		$criteria->compare('usu_fecha_creacion',$this->usu_fecha_creacion,true);
		$criteria->compare('usu_desabilitado',$this->usu_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
