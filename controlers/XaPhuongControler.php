<?php
namespace thuctap\controlers;

require_once MODELS_PATH."TinhThanh.php";
require_once MODELS_PATH."QuanHuyen.php";
require_once MODELS_PATH."XaPhuong.php";
require_once VIEWS_PATH."BaseView.php";
use thuctap\models\TinhThanh;
use thuctap\models\QuanHuyen;
use thuctap\models\XaPhuong;
use thuctap\views\BaseView;

class XaPhuongControler{
	public static function getXaPhuong(){
		$code = $_GET['qhcode'];
		$param = XaPhuong::findItemBy('dm_quanhuyenCode', $code);
		$view = new BaseView('json_layout.php');
		$view->setContentType('text/html');
		$view->setPramaters($param);
		$view->render();
	}


}
?>