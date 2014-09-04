<?php

/**
 * This is the model class for table "comite".
 *
 * The followings are the available columns in table 'comite':
 * @property integer $id
 * @property string $nombre
 * @property string $razon
 * @property string $creacion
 * @property string $saldo
 *
 * The followings are the available model relations:
 * @property Cuenta[] $cuentas
 * @property Miembro[] $miembros
 * @property Proyecto[] $proyectos
 */
class Comite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comite the static model class
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
		return 'comite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, razon, creacion', 'required'),
			array('nombre', 'length', 'max'=>50),			
			array('razon', 'length', 'max'=>1),			
			array('creacion', 'date', 'format'=>array('yyyy-MM-dd','dd-MM-yyyy')),
			array('saldo', 'length', 'max'=>13),			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, razon, creacion', 'safe', 'on'=>'search'),
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
			'cuentas' => array(self::HAS_MANY, 'Cuenta', 'idcomite'),
			'miembros' => array(self::HAS_MANY, 'Miembro', 'idcomite'),
			'proyectos' => array(self::HAS_MANY, 'Proyecto', 'idcomite'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => ' Comite',
			'razon' => 'Razon',
			'creacion' => 'Fecha de creacion',
		
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
		$criteria->compare('razon',$this->razon,true);
		$criteria->compare('creacion',$this->creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static $lRazon=array('E'=>'Escolar','C'=>'Comunidad','I'=>'Institucional' );
	
	public function razon($key=null){
		if($key=='all')	return self::$lRazon;
		return self::$lRazon[$key?$key:$this->razon];
	}
	
}