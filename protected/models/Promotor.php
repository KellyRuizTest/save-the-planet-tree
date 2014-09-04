<?php

/**
 * This is the model class for table "promotor".
 *
 * The followings are the available columns in table 'promotor':
 * @property integer $id
 * @property integer $permanente
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Persona $id0
 * @property Proyecto[] $proyectos
 */
class Promotor extends CActiveRecord{
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'promotor';
	}

	public function rules(){
		return array(
			array('id, permanente, activo', 'required'),
			array('id, permanente, activo', 'numerical', 'integerOnly'=>true),
			array('id, permanente, activo', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
			'id0' => array(self::BELONGS_TO, 'Persona', 'id'),
			'proyectos' => array(self::HAS_MANY, 'Proyecto', 'idpromotor'),
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'permanente' => 'Tipo de Promotor',
			'activo' => 'Tipo de Servicio',
		);
	}

	public function search(){
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('permanente',$this->permanente);
		$criteria->compare('activo',$this->activo);
		return new CActiveDataProvider($this, array('criteria'=>$criteria,));
	}
	
	public function persona($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Persona::model()->findAll() as $key){
                    $list[$key->id]=$key->cedula." - ".$key->apellido.", ".$key->nombre;
                }
                return $list;
            break;
            default:
                return Persona::model()->findByPK($key?$key:$this->id);
        }
    }
	
	public static $lPermanente=array(1=>'Permanente',0=>'Temporal');
	
	public function permanente($key=null){
		if($key=='all')	return self::$lPermanente;
		return self::$lPermanente[$key?$key:$this->permanente];
	}
	
	public static $lActivo=array(1=>'Activo',0=>'Inactivo');
	
	public function activo($key=null){
		if($key=='all')	return self::$lActivo;
		return self::$lActivo[$key?$key:$this->activo];
	}
}