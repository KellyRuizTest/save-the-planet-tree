<?php

/**
 * This is the model class for table "desembolso".
 *
 * The followings are the available columns in table 'desembolso':
 * @property integer $id
 * @property integer $idproyecto
 * @property integer $idmiembro
 * @property string $cheque
 * @property string $fecha_cobro
 * @property string $fecha_emision
 * @property string $monto
 * @property string $nota
 * @property integer $primer
 *
 * The followings are the available model relations:
 * @property Proyecto $idproyecto0
 * @property Rendicion $rendicion
 */
class Desembolso extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Desembolso the static model class
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
		return 'desembolso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproyecto, idmiembro, cheque, fecha_emision, monto, nota, primer', 'required'),
			array('idproyecto, idmiembro, primer', 'numerical', 'integerOnly'=>true),
			array('cheque', 'length', 'max'=>8),
			array('monto', 'length', 'max'=>10),
			array('nota', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idproyecto, idmiembro, cheque, fecha_cobro, fecha_emision, monto, nota, primer', 'safe', 'on'=>'search'),
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
			'idproyecto0' => array(self::BELONGS_TO, 'Proyecto', 'idproyecto'),
			'rendicion' => array(self::HAS_ONE, 'Rendicion', 'id'),
			'idmiembro0' => array(self::BELONGS_TO, 'Miembro', 'idmiembro'),
				
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idproyecto' => Proyecto::model()->getAttributeLabel('nombre'),
			'idmiembro' => 'Portador',
			'cheque' => 'Numero de Cheque',
			'fecha_emision' => 'Fecha Emision',
			'fecha_cobro' => 'Fecha Cobro',
			'monto' => 'Monto',
			'nota' => 'Observación',
			'primer' => 'Numero de desembolso',
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
		$criteria->compare('idproyecto',$this->idproyecto);
		$criteria->compare('idmiembro',$this->idmiembro);
		$criteria->compare('cheque',$this->cheque,true);
		$criteria->compare('fecha_cobro',$this->fecha_cobro,true);
		$criteria->compare('fecha_emision',$this->fecha_emision,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('nota',$this->nota,true);
		$criteria->compare('primer',$this->primer);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function proyecto($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Proyecto::model()->findAll() as $key){
                    $list[$key->id]=$key['numero']." - ".$key->nombre;
                }
                return $list;
            break;
            case 'name':
                $proyecto=Proyecto::model()->findByPK($this->idproyecto);
                return $proyecto->numero." - ".$proyecto->nombre;
            break;
            default:
                return Proyecto::model()->findByPK($key?$key:$this->idproyecto);
        }
    }
    
    public function miembro($key=null){
    	switch ($key) {
    		case 'all':
    			$list=array();
    			foreach(Miembro::model()->findAll() as $key){
    				if ($key->coordinador == 1 ){	
    					$list[$key->id]=$key->persona()->nombre." - "."Comite: ".$key->comite()->nombre;
    				}
    			}
    			return $list;
    			break;
    		default:
    			return Miembro::model()->findByPK($key?$key:$this->idmiembro);
    	}
    }
    
	
	public static $lPrimer=array(1=>'Segundo Desembolso',0=>'Primer Desembolso', 2=>'Tercer Desembolso');
	
	public function primer($key=null){
		if($key=='all')	return self::$lPrimer;
		return self::$lPrimer[$key?$key:$this->primer];
	}
}