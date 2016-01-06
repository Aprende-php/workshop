<?php

/**
 * This is the model class for table "tipo_pregunta".
 *
 * The followings are the available columns in table 'tipo_pregunta':
 * @property string $tpr_id
 * @property string $tpr_nombre
 * @property string $tpr_fecha_creacion
 * @property integer $tpr_desabilitado
 */
class TipoPregunta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_pregunta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tpr_nombre, tpr_fecha_creacion', 'required'),
			array('tpr_desabilitado', 'numerical', 'integerOnly'=>true),
			array('tpr_nombre', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tpr_id, tpr_nombre, tpr_fecha_creacion, tpr_desabilitado', 'safe', 'on'=>'search'),
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
			'tpr_id' => 'ID',
			'tpr_nombre' => 'Nombre',
			'tpr_fecha_creacion' => 'Fecha',
			'tpr_desabilitado' => 'Estado',
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

		$criteria->compare('tpr_id',$this->tpr_id,true);
		$criteria->compare('tpr_nombre',$this->tpr_nombre,true);
		$criteria->compare('tpr_fecha_creacion',$this->tpr_fecha_creacion,true);
		$criteria->compare('tpr_desabilitado',$this->tpr_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoPregunta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
