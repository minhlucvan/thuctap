<?php
namespace thuctap\controlers;

require_once MODELS_PATH."TinhThanh.php";
require_once VIEWS_PATH."BaseView.php";
use thuctap\models\TinhThanh;
use thuctap\views\BaseView;

class TinhThanhControler{
	public static function getTinhThanh(){
		$param = TinhThanh::getAll();
		$view = new BaseView('json_layout.php');
		$view->setContentType('text/html');
		$view->setPramaters($param);
		$view->render();
	}	
}
?>