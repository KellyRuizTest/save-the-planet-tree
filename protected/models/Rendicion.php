<?php

/**
 * This is the model class for table "rendicion".
 *
 * The followings are the available columns in table 'rendicion':
 * @property integer $id
 * @property string $fecha
 * @property string $tipo
 * @property string $numero
 * @property string $monto
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Desembolso $id0
 */
class Rendicion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rendicion the static model class
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
		return 'rendicion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, fecha, descripcion', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('tipo', 'length', 'max'=>1),
			array('numero, monto', 'length', 'max'=>10),
			array('descripcion', 'length', 'max'=>100),
			array('descripcion', 'safe'),
			array('fecha', 'date', 'format'=>array('yyyy-MM-dd','dd-MM-yyyy')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha, tipo, numero, monto, descripcion', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'Desembolso', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Rendicion',
			'fecha' => 'Fecha de Rendicion',
			'tipo' => 'Tipo',
			'numero' => 'Numero',
			'monto' => 'Monto',
			'descripcion' => 'Descripcion',
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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static $lTipo=array('R'=>'Recibo','F'=>'Factura','C'=>'Comisión Bancaria');
	
	public function tipo($key=null){
		if($key=='all')	return self::$lTipo;
		return self::$lTipo[$key?$key:$this->tipo];
	}
		
	
	
	
	
	public function desembolso($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Desembolso::model()->findAll() as $key){
                    $list[$key->id]=$key->proyecto()->numero.", ".$key->primer();
                }
                return $list;
            break;
            case 'name':
                $desembolso=Desembolso::model()->findByPK($this->id);
                return $desembolso->proyecto()->numero.", ".$desembolso->primer();
            break;
            default:
                return Desembolso::model()->findByPK($key?$key:$this->id);
        }
    }
	
	

	
	public function fecha($key=null){
		return $this->fecha>0?($this->fecha=date($key?'d-m-Y':'Y-m-d',strtotime($this->fecha))):'';
	}
}