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
			array('emp_rut, lic_usos, lic_fecha_creacion', 'required'),
			array('lic_desabilitado', 'numerical', 'integerOnly'=>true),
			array('emp_rut', 'length', 'max'=>13),
			array('lic_usos', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('lic_id, emp_rut, lic_usos, lic_fecha_creacion, lic_desabilitado', 'safe', 'on'=>'search'),
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
			'lic_id' => 'Lic',
			'emp_rut' => 'Emp Rut',
			'lic_usos' => 'Lic Usos',
			'lic_fecha_creacion' => 'Lic Fecha Creacion',
			'lic_desabilitado' => 'Lic Desabilitado',
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

		$criteria->compare('lic_id',$this->lic_id,true);
		$criteria->compare('emp_rut',$this->emp_rut,true);
		$criteria->compare('lic_usos',$this->lic_usos,true);
		$criteria->compare('lic_fecha_creacion',$this->lic_fecha_creacion,true);
		$criteria->compare('lic_desabilitado',$this->lic_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Licencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
