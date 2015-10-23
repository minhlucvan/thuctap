<?php
namespace thuctap\controlers;
require_once MODELS_PATH."TinhThanh.php";
require_once MODELS_PATH."QuanHuyen.php";
require_once MODELS_PATH."XaPhuong.php";
require_once MODELS_PATH."DonVi.php";
require_once VIEWS_PATH."BaseView.php";
require_once PHPEXCEL_ROOT_PATH."PHPExcel.php";
require_once PHPEXCEL_ROOT_PATH."PHPExcel/Writer/Excel2007.php";
use thuctap\models\TinhThanh;
use thuctap\models\QuanHuyen;
use thuctap\models\DonVi;
use thuctap\models\XaPhuong;
use thuctap\views\BaseView;

class DonViControler{
	public static function getDonVi(){
		$code = $_GET['xpcode'];
		$param = DonVi::findItemBy('dm_xaphuongCode', $code);
		$view = new BaseView('json_layout.php');
		$view->setContentType('text/html');
		$view->setPramaters($param);
		$view->render();
	}

	private static function boundForm(){
		if(!isset($_POST)) return false;
		try{
			$code = $_POST['code'];
			$ma = $_POST['ma'];
			$tendonvi = $_POST['tendonvi'];
			$stt = $_POST['stt'];
			$dm_xaphuongCode = $_POST['dm_xaphuongCode'];
			$sdt = $_POST['sdt'];
			$nguoidaidien = $_POST['nguoidaidien'];
			$ghichu = $_POST['ghichu'];

			$donvi = new DonVi();
			$donvi->set('code', $code);
			$donvi->set('dm_xaphuongCode', $dm_xaphuongCode);
			$donvi->set('ma', $ma);
			$donvi->set('tendonvi', $tendonvi);
			$donvi->set('sdt', $sdt);
			$donvi->set('nguoidaidien', $nguoidaidien);
			$donvi->set('ghichu', $ghichu);
			$donvi->set('stt', $stt);
			return $donvi;
		} catch(Exception $e){
			return false;
		}
	}

	public static function themdonvi(){
		if($_POST == NULL){
			header("HTTP/1.1 204 No Content");
			exit(0);
		} 
		$donvi = self::boundForm();
		if($donvi === false){
			echo 'cập nhật không thành công';	
		}

		$donvi->save();
		echo 'cập nhật thành công';
		
	}

	public static function capnhat(){
		if($_POST == NULL){
			header("HTTP/1.1 204 No Content");
			exit(0);
		} 
		$donvi = self::boundForm();
		if($donvi === false){
			echo 'cập nhật không thành công';	
		}

		$donvi->update();
		echo 'cập nhật thành công';
	}

	public static function xoadonvi(){
		if($_SERVER['REQUEST_METHOD'] != 'DELETE'){
			header("HTTP/1.1 204 No Content");
			exit(0);
		}
		parse_str(file_get_contents("php://input"),$_DELETE);
		$code  = $_DELETE['code'];
		$stt = $_DELETE['stt'];
		$xp = $_DELETE['xp'];
		$donvi = new DonVi($code);
		
		if($donvi->delete()){
			DonVi::updateStt($stt, $xp);
			echo 'đã xóa đơn vị';
		} else{
			echo 'khổng thể xóa đơn vị';
		}

	}

	public static function indanhsach(){
		ini_set('memory_limit', '-1');
		$tinhthanh = TinhThanh::findItemById('1')[0]['ten'] | '';
		$quanhuyen = QuanHuyen::findItemById('1')[0]['ten'] | '';
		$donvi = DonVi::findItemById('1')[0]['tendonvi'] | '';
		$result = DonVi::findItemBy('dm_xaphuongCode', '1');
		
		$param = array('tinhthanh' => $tinhthanh,'quanhuyen' => $quanhuyen, 'donvi' => $donvi, 'result' => $result);
		$view = new BaseView("baocao_layout.php");
		$view->setPramaters($param);
		return $view->render();
	}
}
?>