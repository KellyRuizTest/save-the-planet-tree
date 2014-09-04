<?php

/**
 * This is the model class for table "zona".
 *
 * The followings are the available columns in table 'zona':
 * @property integer $id
 * @property string $nombre
 * @property string $desripcion
 * @property string $precipitacion
 * @property string $temperatura
 *
 * The followings are the available model relations:
 * @property Cuenca[] $cuencas
 * @property Proyecto[] $proyectos
 */
class Zona extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Zona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, desripcion, precipitacion, temperatura', 'required'),
			array('nombre', 'length', 'max'=>50),
			array('precipitacion, temperatura', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, desripcion, precipitacion, temperatura', 'safe', 'on'=>'search'),
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
			'cuencas' => array(self::HAS_MANY, 'Cuenca', 'idzona'),
			'proyectos' => array(self::HAS_MANY, 'Proyecto', 'idzona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => ' Zona',
			'desripcion' => 'Desripcion',
			'precipitacion' => 'Precipitacion',
			'temperatura' => 'Temperatura',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('desripcion',$this->desripcion,true);
		$criteria->compare('precipitacion',$this->precipitacion,true);
		$criteria->compare('temperatura',$this->temperatura,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}