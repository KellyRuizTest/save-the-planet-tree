<?php

/**
 * This is the model class for table "miembro".
 *
 * The followings are the available columns in table 'miembro':
 * @property integer $id
 * @property integer $coordinador
 * @property integer $idcomite
 *
 * The followings are the available model relations:
 * @property Persona $id0
 * @property Comite $idcomite0
 */
class Miembro extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'miembro';
	}
	
	public function rules(){
		return array(
			array('id, coordinador, idcomite', 'required'),
			array('id, coordinador, idcomite', 'numerical', 'integerOnly'=>true),
			array('id, coordinador, idcomite', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
			'id0' => array(self::BELONGS_TO, 'Persona', 'id'),
			'desembolsos' => array(self::HAS_MANY, 'Desembolso', 'iddesembolso'),	
			'idcomite0' => array(self::BELONGS_TO, 'Comite', 'idcomite'),
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'Cedula',
			'coordinador' => 'Cargo actual',
			'idcomite' => Comite::model()->getAttributeLabel('nombre'),
		);
	}

	public function search(){
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('coordinador',$this->coordinador);
		$criteria->compare('idcomite',$this->idcomite);
		return new CActiveDataProvider($this, array('criteria'=>$criteria,));
	}
	
	public function persona($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Persona::model()->findAll() as $key){
                    $list[$key->id]=$key['cedula']." - ".$key['apellido'].", ".$key->nombre;
                }
                return $list;
            break;
            default:
                return Persona::model()->findByPK($key?$key:$this->id);
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
	
	public static $lCoordinador=array(1=>'Coordinador',0=>'Miembro');
	
	public function coordinador($key=null){
		if($key=='all')	return self::$lCoordinador;
		return self::$lCoordinador[$key?$key:$this->coordinador];
	}
}