<?php

/**
 * This is the model class for table "area_operativa".
 *
 * The followings are the available columns in table 'area_operativa':
 * @property string $are_id
 * @property string $are_nombre
 * @property string $are_fecha_creacion
 * @property integer $are_desabilitado
 */
class AreaOperativa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'area_operativa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('are_nombre, are_fecha_creacion', 'required'),
			array('are_desabilitado', 'numerical', 'integerOnly'=>true),
			array('are_nombre', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('are_id, are_nombre, are_fecha_creacion, are_desabilitado', 'safe', 'on'=>'search'),
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
			'are_id' => 'Are',
			'are_nombre' => 'Are Nombre',
			'are_fecha_creacion' => 'Are Fecha Creacion',
			'are_desabilitado' => 'Are Desabilitado',
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

		$criteria->compare('are_id',$this->are_id,true);
		$criteria->compare('are_nombre',$this->are_nombre,true);
		$criteria->compare('are_fecha_creacion',$this->are_fecha_creacion,true);
		$criteria->compare('are_desabilitado',$this->are_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AreaOperativa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
