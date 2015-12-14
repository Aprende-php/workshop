<?php

/**
 * This is the model class for table "tipo_empresa".
 *
 * The followings are the available columns in table 'tipo_empresa':
 * @property string $tem_id
 * @property string $tem_nombre
 * @property string $tem_fecha_creacion
 * @property integer $tem_desabilitado
 */
class TipoEmpresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tem_nombre, tem_fecha_creacion', 'required'),
			array('tem_desabilitado', 'numerical', 'integerOnly'=>true),
			array('tem_nombre', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tem_id, tem_nombre, tem_fecha_creacion, tem_desabilitado', 'safe', 'on'=>'search'),
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
			'tem_id' => 'Tem',
			'tem_nombre' => 'Tem Nombre',
			'tem_fecha_creacion' => 'Tem Fecha Creacion',
			'tem_desabilitado' => 'Tem Desabilitado',
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

		$criteria->compare('tem_id',$this->tem_id,true);
		$criteria->compare('tem_nombre',$this->tem_nombre,true);
		$criteria->compare('tem_fecha_creacion',$this->tem_fecha_creacion,true);
		$criteria->compare('tem_desabilitado',$this->tem_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoEmpresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
