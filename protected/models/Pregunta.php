<?php

/**
 * This is the model class for table "pregunta".
 *
 * The followings are the available columns in table 'pregunta':
 * @property string $pre_id
 * @property string $tpr_id
 * @property string $tev_id
 * @property string $pre_descripcion
 * @property string $pre_comentario
 * @property string $pre_imagen
 * @property string $pre_imagen_admin
 * @property string $pre_fecha_creacion
 * @property integer $pre_desabilitado
 */
class Pregunta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pregunta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tpr_id, tev_id, pre_descripcion, pre_imagen, pre_fecha_creacion', 'required'),
			array('pre_desabilitado', 'numerical', 'integerOnly'=>true),
			array('tpr_id, tev_id', 'length', 'max'=>10),
			array('pre_descripcion', 'length', 'max'=>512),
			array('pre_imagen, pre_imagen_admin', 'length', 'max'=>2048),
			array('pre_comentario', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pre_id, tpr_id, tev_id, pre_descripcion, pre_comentario, pre_imagen, pre_imagen_admin, pre_fecha_creacion, pre_desabilitado', 'safe', 'on'=>'search'),
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
			'pre_id' => 'ID',
			'tpr_id' => 'Tipo Pregunta',
			'tev_id' => 'Tipo Evaluación',
			'pre_descripcion' => 'Descripcion',
			'pre_comentario' => 'Comentario',
			'pre_imagen' => 'Imagen',
			'pre_imagen_admin' => 'Imagen Admin',
			'pre_fecha_creacion' => 'Fecha Creación',
			'pre_desabilitado' => 'Estado',
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

		$criteria->compare('pre_id',$this->pre_id,true);
		$criteria->compare('tpr_id',$this->tpr_id,true);
		$criteria->compare('tev_id',$this->tev_id,true);
		$criteria->compare('pre_descripcion',$this->pre_descripcion,true);
		$criteria->compare('pre_comentario',$this->pre_comentario,true);
		$criteria->compare('pre_imagen',$this->pre_imagen,true);
		$criteria->compare('pre_imagen_admin',$this->pre_imagen_admin,true);
		$criteria->compare('pre_fecha_creacion',$this->pre_fecha_creacion,true);
		$criteria->compare('pre_desabilitado',$this->pre_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pregunta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
