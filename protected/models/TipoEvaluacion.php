<?php

/**
 * This is the model class for table "tipo_evaluacion".
 *
 * The followings are the available columns in table 'tipo_evaluacion':
 * @property string $tev_id
 * @property string $tev_nombre
 * @property string $tev_fecha_creacion
 * @property integer $tev_desabilitado
 */
class TipoEvaluacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tev_nombre, tev_fecha_creacion', 'required'),
			array('tev_desabilitado', 'numerical', 'integerOnly'=>true),
			array('tev_nombre', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tev_id, tev_nombre, tev_fecha_creacion, tev_desabilitado', 'safe', 'on'=>'search'),
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
			'tev_id' => 'ID',
			'tev_nombre' => 'Nombre',
			'tev_fecha_creacion' => 'Fecha Creacion',
			'tev_desabilitado' => 'Estado',
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

		$criteria->compare('tev_id',$this->tev_id,true);
		$criteria->compare('tev_nombre',$this->tev_nombre,true);
		$criteria->compare('tev_fecha_creacion',$this->tev_fecha_creacion,true);
		$criteria->compare('tev_desabilitado',$this->tev_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoEvaluacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
