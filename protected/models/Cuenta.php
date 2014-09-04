<?php

/**
 * This is the model class for table "cuenta".
 *
 * The followings are the available columns in table 'cuenta':
 * @property integer $id
 * @property string $numero
 * @property string $titular
 * @property integer $idcomite
 * @property integer $idbanco
 *
 * The followings are the available model relations:
 * @property Banco $idbanco0
 * @property Comite $idcomite0
 */
class Cuenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cuenta the static model class
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
		return 'cuenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numero, titular, idcomite, idbanco', 'required'),
			array('idcomite, idbanco', 'numerical', 'integerOnly'=>true),
			array('numero', 'length', 'max'=>23),
			array('titular', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, numero, titular, idcomite, idbanco', 'safe', 'on'=>'search'),
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
			'idbanco0' => array(self::BELONGS_TO, 'Banco', 'idbanco'),
			'idcomite0' => array(self::BELONGS_TO, 'Comite', 'idcomite'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero de Cuenta',
			'titular' => 'Titular de la Cuenta',
			'idcomite' => Comite::model()->getAttributeLabel('nombre'),
			'idbanco' => Banco::model()->getAttributeLabel('nombre'),
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('titular',$this->titular,true);
		$criteria->compare('idcomite',$this->idcomite);
		$criteria->compare('idbanco',$this->idbanco);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	
		
	public function banco($key=null){
        switch ($key) {
            case 'all':
                $list=array();
                foreach(Banco::model()->findAll() as $key){
                    $list[$key->id]=$key->nombre;
                }
                return $list;
            break;
            default:
                return Banco::model()->findByPK($key?$key:$this->idbanco);
        }
    }
	
	
	
	

}