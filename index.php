<?php
namespace thuctap;
require_once "app_config.php";
require_once CONTROLERS_PATH."BaseControler.php";
require_once CONTROLERS_PATH."TinhThanhControler.php";
require_once CONTROLERS_PATH."QuanHuyenControler.php";
require_once CONTROLERS_PATH."XaPhuongControler.php";
require_once CONTROLERS_PATH."DonViControler.php";
use thuctap\controlers\BaseControler;
use thuctap\controlers\TinhThanhControler;
use thuctap\controlers\QuanHuyenControler;
use thuctap\controlers\XaPhuongControler;
use thuctap\controlers\DonViControler;

	if (empty($_GET)) {
		BaseControler::index();
	} elseif (isset($_GET["action"])){
		$act = $_GET["action"];
		switch ($act) {
			case 'gettinhthanh':
				TinhThanhControler::getTinhThanh();
				break;
			case 'getquanhuyen':
				QuanHuyenControler::getQuanHuyen();
				break;	
			case 'getxaphuong':
				XaPhuongControler::getXaPhuong();
				break;
			case 'getdonvi':
				DonViControler::getdonvi();
				break;
			case 'xoadonvi':
					DonViControler::xoadonvi();
					break;
			case 'themdonvi':
				DonViControler::themdonvi();
				break;
			case 'capnhatdonvi':
				DonViControler::capnhat();
				break;							
			case 'indanhsach':
				DonViControler::indanhsach();
				break;
			default:
				header("HTTP/1.1 404 Not Found");
				echo "action not found";
				break;
		}
	} else header("HTTP/1.0 404 Not Found");
?>