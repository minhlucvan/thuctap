<?php
namespace thuctap\models;
require_once DOC_ROOT_PATH."thuctap/DB.php";
use thuctap\DB;

abstract class BaseModel{
	function __construct(){
	 	$this->values = array();
	 	foreach (static::$fields as $field) {
	 		$this->values += array($field => null);
	 	}

	 	if(func_num_args() == 1){
			$val = func_get_args(0);
			$this->values[static::$primaryKey] = $val[0][0];
		}
	}

	public static function getAll(){
	 	$db = new DB();
	 	$rs = $db->findAll(static::$tableName, static::$defaultOrder);
	 	return $db->fetch_associate($rs);
	 }

	 public static function findItemById($id){
	 	$db = new DB();
	 	$rs = $db->findBy(static::$tableName,static::$primaryKey ,$id, static::$defaultOrder);
	 	return $db->fetch_associate($rs);
	 }

	 public static function findItemBy($field, $value){
	 	$db = new DB();
	 	$rs = $db->findBy(static::$tableName, $field, $value, static::$defaultOrder);
	 	return $db->fetch_associate($rs);
	 }

	 public static function store($item){
	 	$db = new DB();
	 	return $db->addRow(static::$tableName,$item->primaryKey() ,$item->getFields(), $item->getValues());
	 }

	public static function remove($item){
		$db = new DB();
	 	return $db->removeRow(static::$tableName, $item->primaryKey()['field'], $item->primaryKey()['value']);
	}	 

	public static function updateItem($item){
		$db = new DB();
		return $db->updateRow(static::$tableName, $item->primaryKey(), $item->getFields(), $item->getValues());
	}

	 public function save(){
	 	return static::store($this);
	 }

	 public function delete(){
	 	return static::remove($this);
	 }

	 public function update(){
	 	return static::updateItem($this);
	 }

	 public function isStored(){

	 }

	 public function getFields(){
	 	return static::$fields;
	 }

	 public function getValues(){
	 	return $this->values;
	 }

	 public function get($field){
	 	return $this->values[$field];
	 }

	 public function set($field, $value){
	 	$this->values[$field] = $value;
	 }

	 public function primaryKey(){
	 	return array('field' => static::$primaryKey, 'value' => $this->values[static::$primaryKey]);	
	 }
} 
?>