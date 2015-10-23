<?php
namespace thuctap\models;
require_once MODELS_PATH."BaseModel.php";
use thuctap\models\BaseModel;
use thuctap\DB;
class DonVi extends BaseModel{
	protected static $tableName = 'dm_donvi';
	protected static $primaryKey = 'code';
	protected static $defaultOrder ='stt';
	protected static $fields = array('code', 'dm_xaphuongCode', 'stt', 'ma', 'tendonvi', 'sdt', 'nguoidaidien', 'ghichu');
	function __construct(){
		$this->set('dm_xaphuongCode', '');
		$this->set('stt', -1);
		$this->set('ma', '');
		$this->set('tendonvi', '');
		$this->set('sdt', '');
		$this->set('ghichu', '');
		if(func_num_args()>0){
			$arg = func_get_args();
			parent::__construct($arg);
		} else{
			parent::__construct();
		}
	}

	public static function updateStt($stt, $xaphuong){
		$rs = self::findItemBy('dm_xaphuongCode', $xaphuong);
		foreach ($rs as $donvi) {
			if($donvi['stt'] > $stt){
				$db = new DB();
				$db->updateField(self::$tableName, array('field' => 'code', 'value' => $donvi['code']), 'stt', $donvi['stt']-1);
			}
		}
	}
}

?>