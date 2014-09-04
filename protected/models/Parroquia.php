<?php

/**
 * This is the model class for table "parroquia".
 *
 * The followings are the available columns in table 'parroquia':
 * @property integer $id
 * @property string $nombre
 * @property integer $idmunicipio
 *
 * The followings are the available model relations:
 * @property Municipio $idmunicipio0
 * @property Proyecto[] $proyectos
 */
class Parroquia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parroquia the static model class
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
		return 'parroquia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, idmunicipio', 'required'),
			array('idmunicipio', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, idmunicipio', 'safe', 'on'=>'search'),
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
			'idmunicipio0' => array(self::BELONGS_TO, 'Municipio', 'idmunicipio'),
			'proyectos' => array(self::HAS_MANY, 'Proyecto', 'idparroquia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => ' Parroquia',
			'idmunicipio' => Municipio::model()->getAttributeLabel('nombre'),
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
		$criteria->compare('idmunicipio',$this->idmunicipio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



		
	public function municipio($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Municipio::model()->findAll() as $key){
                    $list[$key->id]=$key->nombre;
                }
                return $list;
            break;
            case 'name':
                $municipio=Municipio::model()->findByPK($this->Municipio);
                return $municipio->nombre;
            break;
            default:
                return Municipio::model()->findByPK($key?$key:$this->Municipio);
        }
    }
	
	
	
	

	
}