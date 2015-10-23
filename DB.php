<?php
namespace thuctap;
require_once DOC_ROOT_PATH."thuctap/db_config.php";
use thuctap\db_settings;

class DB{
	private $connection;

	function __construct(){
		$this->connect();
	}

	function __destruct(){
		$this->close();
	}

	private function connect(){
		// Create connection
		global $db_settings;
		$this->connection = mysqli_connect($db_settings['server'], $db_settings['user'], $db_settings['password'], $db_settings['database']);
		// Check connection
		if (!$this->connection) {
    		die("Connection failed: " . mysqli_connect_error());
		}

		mysqli_query($this->connection, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'"	);
	}

	public function begin(){
      $null = mysqli_query("START TRANSACTION", $this->connection);
      return mysqli_query( $this->connection, "BEGIN");
   }

   public function commit(){
      return mysqli_query($this->connection, "COMMIT");
   }

   public function rollback(){
      return mysqli_query($this->connection, "ROLLBACK");
   }

   public function fetch_numberic($result){
   		return mysqli_fetch_all($result, MYSQLI_NUM);
   }

   public function fetch_associate($result){
   		return mysqli_fetch_all($result, MYSQLI_ASSOC);	
   }

   public function close(){
   		mysqli_close($this->connection);
   }

   public function status(){
   	if (mysqli_connect_errno()) {
    	return "Connect failed: ".mysqli_connect_error();
	}
    return "Errormessage: ".mysqli_error($this->connection);
   }

	public function addRow($table,$pmKey , $fields, $values){
		$fieldset = "";
		$valueset = "";
		$nfield = 0;
		foreach ($fields as $field) {
			if($nfield > 0){
				$fieldset = $fieldset.", ";
				$valueset = $valueset.", ";	
			}
			$nfield++;
			mysqli_real_escape_string($this->connection, $field);
			$fieldset = $fieldset."`".$field."`";
			if($field != $pmKey['field']){
				$value = $values[$field];
				mysqli_real_escape_string($this->connection, $value);
				$valueset = $valueset."'".$value."'";
			} else{
				$valueset = $valueset."NULL";
			}
		}

		$fieldset = " (".$fieldset.") ";
		$valueset = " (".$valueset.") ";
		$sql = "INSERT INTO `".$table."` ".$fieldset." VALUES ".$valueset;
		return mysqli_query($this->connection, $sql);
	}

	public function removeRow($table, $field, $value){
		mysqli_real_escape_string($this->connection, $field);
		mysqli_real_escape_string($this->connection, $value);
		$query = "DELETE FROM ".$table." WHERE ".$field." = ".$value;
		return mysqli_query($this->connection, $query); 
	}

	public function updateField($table, $pmkey ,$field, $value){
		$pmfield = $pmkey['field'];
		$pmvalue = $pmkey['value'];
		mysqli_real_escape_string($this->connection, $table);
		mysqli_real_escape_string($this->connection, $field);
		mysqli_real_escape_string($this->connection, $value);
		mysqli_real_escape_string($this->connection, $pmfield);
		mysqli_real_escape_string($this->connection, $pmvalue);

		$query = "UPDATE ".$table." SET ".$field."='".$value."' WHERE ".$pmfield."=".$pmvalue;
		return mysqli_query($this->connection, $query);
	}	

	public function updateRow($table, $pmkey ,$fields, $values){
		$set = "";
		$nfield = 0;
		foreach ($fields as $field) {
			if($field != $pmkey['field']){
				if($nfield > 0){
					$set = $set.", ";		
				}
				$nfield++;
				$set = $set." ".$field."=\"".$values[$field]."\" ";
			}
		}

		$pmfield = $pmkey['field'];
		$pmvalue = $pmkey['value'];
		mysqli_real_escape_string($this->connection, $table);
		mysqli_real_escape_string($this->connection, $set);
		mysqli_real_escape_string($this->connection, $pmfield);
		mysqli_real_escape_string($this->connection, $pmvalue);
		$query = "UPDATE ".$table." SET ".$set." WHERE ".$pmfield."=".$pmvalue;
		return mysqli_query($this->connection, $query);
	}

	public function findAll($table, $order){
		mysqli_real_escape_string($this->connection, $table);
		$result = mysqli_query($this->connection,"SELECT * FROM ".$table." ORDER BY ".$order);
		return $result;
	}

	public function findMany($table, $fields, $values,  $order){
		mysqli_real_escape_string($this->connection, $table);
		mysqli_real_escape_string($this->connection, $field);
		mysqli_real_escape_string($this->connection, $value);
	}

	public function findBy($table, $field, $value, $order){
		mysqli_real_escape_string($this->connection, $table);
		mysqli_real_escape_string($this->connection, $field);
		mysqli_real_escape_string($this->connection, $value);

		$query = "SELECT * FROM ".$table." WHERE ".$field." = ".$value." ORDER BY ".$order;
		$result = mysqli_query($this->connection, $query);
		return $result;
	}
}
?>