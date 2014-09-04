<?php

/**
 * This is the model class for table "proyecto".
 *
 * The followings are the available columns in table 'proyecto':
 * @property integer $id
 * @property integer $idparroquia
 * @property integer $idzona
 * @property integer $idpromotor
 * @property integer $idcomite
 * @property string $numero
 * @property string $nombre
 * @property string $fecha
 * @property string $monto
 * @property string $hectareas
 * @property integer $meta
 * @property string $observacion
 * @property string $fase
 * @property string $status
 * @property string $sistema
 *
 * The followings are the available model relations:
 * @property Cultivo[] $cultivos
 * @property Desembolso[] $desembolsos
 * @property Foto[] $fotos
 * @property Comite $idcomite0
 * @property Parroquia $idparroquia0
 * @property Promotor $idpromotor0
 * @property Zona $idzona0
 */
class Proyecto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
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
		return 'proyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idparroquia, idzona, idpromotor, idcomite, numero, nombre, fecha, monto, hectareas, meta, observacion, fase, status, sistema', 'required'),
			array('idparroquia, idzona, idpromotor, idcomite, meta', 'numerical', 'integerOnly'=>true),
			array('numero, monto, hectareas', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>100),
			array('observacion', 'safe'),
			array('fecha', 'date', 'format'=>array('yyyy-MM-dd','dd-MM-yyyy')),
			array('fase, status, sistema', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idparroquia, idzona, idpromotor, idcomite, numero, nombre, fecha, monto, hectareas, meta, observacion, fase, status, sistema', 'safe', 'on'=>'search'),
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
			'cultivos' => array(self::HAS_MANY, 'Cultivo', 'idproyecto'),
			'desembolsos' => array(self::HAS_MANY, 'Desembolso', 'idproyecto'),
			'fotos' => array(self::HAS_MANY, 'Foto', 'idproyecto'),
			'idcomite0' => array(self::BELONGS_TO, 'Comite', 'idcomite'),
			'idparroquia0' => array(self::BELONGS_TO, 'Parroquia', 'idparroquia'),
			'idpromotor0' => array(self::BELONGS_TO, 'Promotor', 'idpromotor'),
			'idzona0' => array(self::BELONGS_TO, 'Zona', 'idzona'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idparroquia' => Parroquia::model()->getAttributeLabel('nombre'),
			'idzona' => Zona::model()->getAttributeLabel('nombre'),
			'idpromotor' => 'Nombre del Promotor',
			'idcomite' => 'Nombre del Comite',
			'numero' => 'Numero de Convenio',
			'nombre' => 'Nombre del Proyecto',
			'fecha' => 'Fecha de inicio',
			'monto' => 'Monto solicitado',
			'hectareas' => 'Hectareas solicitadas',
			'meta' => 'Meta prevista',
			'observacion' => 'Observaciones',
			'fase' => 'Fase del Proyecto',
			'status' => 'Status del Proyecto',
			'sistema' => 'Tipo de Proyecto',
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
		$criteria->compare('idparroquia',$this->idparroquia);
		$criteria->compare('idzona',$this->idzona);
		$criteria->compare('idpromotor',$this->idpromotor);
		$criteria->compare('idcomite',$this->idcomite);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('hectareas',$this->hectareas,true);
		$criteria->compare('meta',$this->meta);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('fase',$this->fase,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('sistema',$this->sistema,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

	public function parroquia($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Parroquia::model()->findAll() as $key){
                    $list[$key->id]=$key->nombre;
                }
                return $list;
            break;
            default:
                return Parroquia::model()->findByPK($key?$key:$this->idparroquia);
        }
    }
	
	
	public function zona($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Zona::model()->findAll() as $key){
                    $list[$key->id]=$key->nombre;
                }
                return $list;
            break;
            default:
                return Zona::model()->findByPK($key?$key:$this->idzona);
        }
    }
		
	public function promotor($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Promotor::model()->findAll() as $key){
					$list[$key->id]=$key->persona()->cedula." - ".$key->persona()->apellido.", ".$key->persona()->nombre;                    
                }
                return $list;
            break;
            case 'name':
                $promotor=Promotor::model()->findByPK($this->idpromotor);
                return $promotor->persona()->apellido.", ".$promotor->persona()->nombre;
            break;
            default:
                return Promotor::model()->findByPK($key?$key:$this->idpromotor);
        }
    }
    
	public function comite($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Comite::model()->findAll() as $key){
                    $list[$key->id]=$key->nombre;
                }
                return $list;
            break;
            default:
                return Comite::model()->findByPK($key?$key:$this->idcomite);
        }
    }
    
	
	public static $lStatus=array('R'=>'Espero de recurso','E'=>'Ejecuci�n', 'C'=>'Cerrado','T'=>'Terminado' );
	
	public function status($key=null){
		if($key=='all')	return self::$lStatus;
		return self::$lStatus[$key?$key:$this->status];
	}
	
	public static $lFase=array('V'=>'Vivero','P'=>'Plantacion', 'M'=>'Mantenimiento');
	
	public function fase($key=null){
		if($key=='all')	return self::$lFase;
		return self::$lFase[$key?$key:$this->fase];
	}
	
	public static $lSistema=array('F'=>'Forestal','A'=>'Agroforestal', 'P'=>'Protector', 'C'=>'Comercial');
	
	public function sistema($key=null){
		if($key=='all')	return self::$lSistema;
		return self::$lSistema[$key?$key:$this->sistema];
	}
	
}