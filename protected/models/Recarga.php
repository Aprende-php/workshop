<?php

/**
 * This is the model class for table "recarga".
 *
 * The followings are the available columns in table 'recarga':
 * @property string $rec_id
 * @property string $emp_rut
 * @property string $usu_rut
 * @property string $rec_fecha_solicitud
 * @property string $rec_fecha_creacion
 * @property string $rec_cantidad
 * @property integer $rec_desabilitado
 */
class Recarga extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recarga';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_rut, usu_rut, rec_fecha_solicitud, rec_fecha_creacion, rec_cantidad', 'required'),
			array('rec_desabilitado', 'numerical', 'integerOnly'=>true),
			array('emp_rut, usu_rut', 'length', 'max'=>13),
			array('rec_cantidad', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rec_id, emp_rut, usu_rut, rec_fecha_solicitud, rec_fecha_creacion, rec_cantidad, rec_desabilitado', 'safe', 'on'=>'search'),
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
			'rec_id' => 'Rec',
			'emp_rut' => 'Emp Rut',
			'usu_rut' => 'Usu Rut',
			'rec_fecha_solicitud' => 'Rec Fecha Solicitud',
			'rec_fecha_creacion' => 'Rec Fecha Creacion',
			'rec_cantidad' => 'Rec Cantidad',
			'rec_desabilitado' => 'Rec Desabilitado',
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

		$criteria->compare('rec_id',$this->rec_id,true);
		$criteria->compare('emp_rut',$this->emp_rut,true);
		$criteria->compare('usu_rut',$this->usu_rut,true);
		$criteria->compare('rec_fecha_solicitud',$this->rec_fecha_solicitud,true);
		$criteria->compare('rec_fecha_creacion',$this->rec_fecha_creacion,true);
		$criteria->compare('rec_cantidad',$this->rec_cantidad,true);
		$criteria->compare('rec_desabilitado',$this->rec_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recarga the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
