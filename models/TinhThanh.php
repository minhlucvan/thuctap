<?php
namespace thuctap\models;
require_once MODELS_PATH."BaseModel.php";
require_once MODELS_PATH."QuanHuyen.php";
use thuctap\models\BaseModel;
use thuctap\models\QuanHuyen;

class TinhThanh extends BaseModel{
	protected static $tableName = 'dm_tinhthanh';
	protected static $primaryKey = 'code';
	protected static $defaultOrder ='ten';
	protected static $fields = array('code', 'stt', 'ma', 'ten', 'kieu');
	function __construct(){
		$this->values = array('code' => -1,'stt' => -1, 'ma' => '', 'ten' => '', 'kieu' => -1);
	}
	
	public function findQuanHuyen(){
		return QuanHuyen::findItemBy("dm_tinhthanhCode", $this->values['code']);
	}	
}
?>