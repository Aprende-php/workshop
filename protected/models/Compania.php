<?php

/**
 * This is the model class for table "compania".
 *
 * The followings are the available columns in table 'compania':
 * @property string $com_id
 * @property string $com_nombre
 * @property string $com_fecha_creacion
 * @property integer $com_desabilitado
 */
class Compania extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'compania';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('com_nombre, com_fecha_creacion', 'required'),
			array('com_desabilitado', 'numerical', 'integerOnly'=>true),
			array('com_nombre', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('com_id, com_nombre, com_fecha_creacion, com_desabilitado', 'safe', 'on'=>'search'),
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
			'com_id' => 'Com',
			'com_nombre' => 'Com Nombre',
			'com_fecha_creacion' => 'Com Fecha Creacion',
			'com_desabilitado' => 'Com Desabilitado',
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

		$criteria->compare('com_id',$this->com_id,true);
		$criteria->compare('com_nombre',$this->com_nombre,true);
		$criteria->compare('com_fecha_creacion',$this->com_fecha_creacion,true);
		$criteria->compare('com_desabilitado',$this->com_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Compania the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
