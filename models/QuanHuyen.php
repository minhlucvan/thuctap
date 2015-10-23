<?php
namespace thuctap\models;
require_once MODELS_PATH."BaseModel.php";
require_once MODELS_PATH."XaPhuong.php";
use thuctap\models\BaseModel;
use thuctap\models\XaPhuong;

class QuanHuyen extends BaseModel{
	protected static $tableName = 'dm_quanhuyen';
	protected static $primaryKey = 'code';
	protected static $defaultOrder ='ten';
	protected static $fields = array('code','dm_tinhthanhcode', 'stt', 'ma', 'ten', 'kieu');
	function __construct(){
		
	}

	public static function init(){
		self::setTableName('dm_quanhuyen');
		self::setPrimaryKey('code');
		self::setfields(array('code','dm_tinhthanhcode', 'stt', 'ma', 'ten', 'kieu'));
	}

	public function findXaPhuong(){
		return XaPhuong::findItemBy("dm_quanhuyenCode", $this->values['code']);
	}	
}
?>