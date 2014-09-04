<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property string $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $telefono
 *
 * The followings are the available model relations:
 * @property Miembro $miembro
 * @property Promotor $promotor
 */
class Persona extends CActiveRecord
{
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'persona';
	}

	public function rules(){
		return array(
			array('cedula, nombre, apellido', 'required'),
        	array('cedula', 'unique'),
        	array('cedula', 'length', 'max'=>10),
			array('nombre, apellido','match','pattern'=>'/^[A-Za-z ]{2,30}$/'),
			array('nombre, apellido', 'length', 'max'=>30),
			array('telefono', 'length', 'max'=>14),
			array('direccion', 'safe'),
			array('sexo', 'safe'),
			array('id, cedula, nombre, apellido, sexo, direccion, telefono', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
			'miembro' => array(self::HAS_ONE, 'Miembro', 'id'),
			'promotor' => array(self::HAS_ONE, 'Promotor', 'id'),
		);
	}

	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'cedula' => 'N� C�dula',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'sexo'	=> 'Sexo',
			'direccion' => 'Direcci�n',
			'telefono' => 'Telefono',
		);
	}

	public function search(){
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		return new CActiveDataProvider($this, array('criteria'=>$criteria,));
	}
	
	public static $lSexo=array('M'=>'Masculino','F'=>'Femenino');
	
	public function sexo($key=null){
		if($key=='all')	return self::$lSexo;
		return self::$lSexo[$key?$key:$this->sexo];
	}
	
}