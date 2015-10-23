<?php
namespace thuctap\controlers;

require_once MODELS_PATH."TinhThanh.php";
require_once MODELS_PATH."QuanHuyen.php";
require_once VIEWS_PATH."BaseView.php";
use thuctap\models\TinhThanh;
use thuctap\models\QuanHuyen;
use thuctap\views\BaseView;

class QuanHuyenControler{
	public static function getQuanHuyen(){
		$ttcode = $_GET['ttcode'];
		$param = QuanHuyen::findItemBy('dm_tinhthanhcode', $ttcode);
		json_encode(QuanHuyen::getFields());
		$view = new BaseView('json_layout.php');
		$view->setContentType('text/html');
		$view->setPramaters($param);
		$view->render();
	}
}
?>