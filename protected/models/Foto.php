<?php

/**
 * This is the model class for table "foto".
 *
 * The followings are the available columns in table 'foto':
 * @property integer $id
 * @property string $nombre
 * @property string $fecha
 * @property string $descripcion
 * @property integer $idproyecto
 * @property string $path
 *
 * The followings are the available model relations:
 * @property Proyecto $idproyecto0
 */
class Foto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Foto the static model class
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
		return 'foto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fecha, descripcion, idproyecto, path', 'required'),
			array('idproyecto', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			array('path', 'length', 'max'=>255),
			array('fecha', 'date', 'format'=>array('yyyy-MM-dd','dd-MM-yyyy')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fecha, descripcion, idproyecto, path', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => ' foto',
			'fecha' => 'Fecha de captura',
			'descripcion' => 'Descripcion de la imagen',
			'idproyecto' => Proyecto::model()->getAttributeLabel('nombre'),
			'path' => 'Ubicacion en disco',
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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idproyecto',$this->idproyecto);
		$criteria->compare('path',$this->path,true);

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
                $proyecto=Proyecto::model()->findByPK($this->Proyecto);
                return $proyecto->numero." - ".$proyecto->nombre;
            break;
            default:
                return Proyecto::model()->findByPK($key?$key:$this->Proyecto);
        }
    }
	
	
	

	
	public function fecha($key=null){
		return $this->fecha>0?($this->fecha=date($key?'d-m-Y':'Y-m-d',strtotime($this->fecha))):'';
	}
	
}