<?php
namespace thuctap\controlers;
require_once(MODELS_PATH.'TinhThanh.php');
require_once(VIEWS_PATH.'BaseView.php');
use thuctap\models\TinhThanh;
use thuctap\views\BaseView; 

class BaseControler{
	public static function index(){
		$view = new BaseView('main_layout.php');
		$view->render();
	}
}
?>	