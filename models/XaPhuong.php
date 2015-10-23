<?php
namespace thuctap\models;
require_once MODELS_PATH."BaseModel.php";
require_once MODELS_PATH."DonVi.php";
use thuctap\models\BaseModel;
use thuctp\models\DonVi;

class XaPhuong extends BaseModel{
	protected static $tableName = 'dm_xaphuong';
	protected static $primaryKey = 'code';
	protected static $defaultOrder ='ten';
	protected static $fields = array('code','dm_quanhuyencode', 'stt', 'ma', 'ten', 'kieu');

	function __construct(){
	}

	public function findDonVi(){
		return DonVi::findItemBy("dm_xaphuongCode", $this->code);
	}
}

?>