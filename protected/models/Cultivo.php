<?php

/**
 * This is the model class for table "cultivo".
 *
 * The followings are the available columns in table 'cultivo':
 * @property integer $id
 * @property integer $cantidad
 * @property string $fecha
 * @property integer $idproyecto
 * @property integer $idespecie
 *
 * The followings are the available model relations:
 * @property Especie $idespecie0
 * @property Proyecto $idproyecto0
 */
class Cultivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cultivo the static model class
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
		return 'cultivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, fecha, idproyecto, idespecie', 'required'),
			array('cantidad, idproyecto, idespecie', 'numerical', 'integerOnly'=>true),
			array('fecha', 'date', 'format'=>array('yyyy-MM-dd','dd-MM-yyyy')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cantidad, fecha, idproyecto, idespecie', 'safe', 'on'=>'search'),
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
			'idespecie0' => array(self::BELONGS_TO, 'Especie', 'idespecie'),
			'idproyecto0' => array(self::BELONGS_TO, 'Proyecto', 'idproyecto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cantidad' => 'Cantidad de Cultivo',
			'fecha' => 'Fecha del Cultivo',
			'idproyecto' => Proyecto::model()->getAttributeLabel('nombre'),
			'idespecie' => Especie::model()->getAttributeLabel('nombre'),
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
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idproyecto',$this->idproyecto);
		$criteria->compare('idespecie',$this->idespecie);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function fecha($key=null){
		return $this->fecha>0?($this->fecha=date($key?'d-m-Y':'Y-m-d',strtotime($this->fecha))):'';
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
                $proyecto=Proyecto::model()->findByPK($this->Proyecto);
                return $proyecto->numero." - ".$proyecto->nombre;
            break;
            default:
                return Proyecto::model()->findByPK($key?$key:$this->Proyecto);
        }
    }
	
	
	




		
	public function especie($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Especie::model()->findAll() as $key){
                    $list[$key->id]=$key->nombre;
                }
                return $list;
            break;
            case 'name':
                $especie=Especie::model()->findByPK($this->Especie);
                return $especie->nombre;
            break;
            default:
                return Especie::model()->findByPK($key?$key:$this->Especie);
        }
    }
	
	
	
	
	

}