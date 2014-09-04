<?php

/**
 * This is the model class for table "cuenca".
 *
 * The followings are the available columns in table 'cuenca':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $idzona
 *
 * The followings are the available model relations:
 * @property Zona $idzona0
 */
class Cuenca extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cuenca the static model class
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
		return 'cuenca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion, idzona', 'required'),
			array('nombre', 'length', 'max'=>50),
			array('idzona', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, idzona', 'safe', 'on'=>'search'),
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
			'nombre' => ' Cuenca',
			'descripcion' => 'Descripcion',
			'idzona' => Zona::model()->getAttributeLabel('nombre'),
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idzona',$this->idzona);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	
	
	
	
	
}