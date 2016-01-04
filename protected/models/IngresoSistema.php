<?php

/**
 * This is the model class for table "ingreso_sistema".
 *
 * The followings are the available columns in table 'ingreso_sistema':
 * @property string $ing_id
 * @property string $usu_rut
 * @property string $ing_fecha_ingreso
 * @property string $ing_navegador
 * @property string $ing_ip
 */
class IngresoSistema extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ingreso_sistema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usu_rut, ing_fecha_ingreso, ing_navegador, ing_ip', 'required'),
			array('usu_rut', 'length', 'max'=>13),
			array('ing_navegador', 'length', 'max'=>256),
			array('ing_ip', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ing_id, usu_rut, ing_fecha_ingreso, ing_navegador, ing_ip', 'safe', 'on'=>'search'),
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
			'ing_id' => 'Ing',
			'usu_rut' => 'Usu Rut',
			'ing_fecha_ingreso' => 'Ing Fecha Ingreso',
			'ing_navegador' => 'Ing Navegador',
			'ing_ip' => 'Ing Ip',
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

		$criteria->compare('ing_id',$this->ing_id,true);
		$criteria->compare('usu_rut',$this->usu_rut,true);
		$criteria->compare('ing_fecha_ingreso',$this->ing_fecha_ingreso,true);
		$criteria->compare('ing_navegador',$this->ing_navegador,true);
		$criteria->compare('ing_ip',$this->ing_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IngresoSistema the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
