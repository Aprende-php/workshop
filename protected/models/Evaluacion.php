<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property string $eva_id
 * @property string $tev_id
 * @property string $emp_rut
 * @property integer $tel_numero
 * @property string $usu_rut
 * @property string $eva_fecha
 * @property string $eva_numero
 * @property string $eva_fecha_creacion
 * @property integer $eva_desabilitado
 */
class Evaluacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tev_id, tel_numero, usu_rut, eva_fecha, eva_fecha_creacion', 'required'),
			array('tel_numero, eva_desabilitado', 'numerical', 'integerOnly'=>true),
			array('tev_id, eva_numero', 'length', 'max'=>10),
			array('emp_rut, usu_rut', 'length', 'max'=>13),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eva_id, tev_id, emp_rut, tel_numero, usu_rut, eva_fecha, eva_numero, eva_fecha_creacion, eva_desabilitado', 'safe', 'on'=>'search'),
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
			'eva_id' => 'ID',
			'tev_id' => 'Tipo Evaluación',
			'emp_rut' => 'Rut Empresa',
			'emp_nombre' => 'Empresa',
			'tel_numero' => 'Numero Telefono',
			'usu_rut' => 'Rut Usuario',
			// 'usu_nombre' => 'Usuario',
			'eva_fecha' => 'Fecha',
			'eva_numero' => 'Numero Evaluación',
			'eva_fecha_creacion' => 'Fecha Creación',
			'eva_desabilitado' => 'Desabilitado',
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

		$criteria->compare('eva_id',$this->eva_id,true);
		$criteria->compare('tev_id',$this->tev_id,true);
		$criteria->compare('emp_rut',$this->emp_rut,true);
		$criteria->compare('tel_numero',$this->tel_numero);
		$criteria->compare('usu_rut',$this->usu_rut,true);
		$criteria->compare('eva_fecha',$this->eva_fecha,true);
		$criteria->compare('eva_numero',$this->eva_numero,true);
		$criteria->compare('eva_fecha_creacion',$this->eva_fecha_creacion,true);
		$criteria->compare('eva_desabilitado',$this->eva_desabilitado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evaluacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getemp_nombre()
	{
		return ($model=Empresa::model()->findByPk($this->emp_rut))?$model->emp_nombre:"Sin Empresa";
	}
	public function getusu_nombre()
	{
		return ($model=Usuario::model()->findByPk($this->usu_rut))?$model->usu_nombre:"Sin Nombre";
	}
	public function gettev_nombre()
	{
		return ($model=TipoEvaluacion::model()->findByPk($this->tev_id))?$model->tev_nombre:"Sin Nombre";
	}
}
