<?php
$numrow = sizeof($result);
		$tinhthanh = $params['tinhthanh'];
		$quanhuyen = $params['quanhuyen'];
		$donvi = $params['donvi'];
		$result = $params['result'];
		$numrow = sizeof($result);

		$currow = 6;
		$objPHPExcel = \PHPExcel_IOFactory::load(LAYOUTS_PATH.'baocaotpl.xlsx');
		$sheet = $objPHPExcel->getActiveSheet();
		$objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);

		$quanFormat = $sheet->getCell('A1')->getValue();
		$truongFormat = $sheet->getCell('A2')->getValue();
		$thoigianbcFormat = $sheet->getCell('A4')->getValue();
		$tinhNTNFormat = $sheet->getCell('D10')->getValue();
		$ngay = getdate()['mday'];
		$thang = getdate()['mon'];
		$nam = getdate()['year'];

		$quanFormat = str_replace('%1', $quanhuyen, $quanFormat);
		$sheet->setCellValue('A1', $quanFormat);

		$truongFormat = str_replace('%1', $donvi, $truongFormat);
		$sheet->setCellValue('A2', $truongFormat);

		$thoigianbcFormat = str_replace('%1', $ngay, $thoigianbcFormat);
		$thoigianbcFormat = str_replace('%2', $thang, $thoigianbcFormat);
		$thoigianbcFormat = str_replace('%3', $nam, $thoigianbcFormat);
		$sheet->setCellValue('A4', $thoigianbcFormat);

		$tinhNTNFormat = str_replace('%1', $tinhthanh, $tinhNTNFormat);
		$tinhNTNFormat = str_replace('%2', $ngay, $tinhNTNFormat);
		$tinhNTNFormat = str_replace('%3', $thang, $tinhNTNFormat);
		$tinhNTNFormat = str_replace('%4', $nam, $tinhNTNFormat);
		$sheet->setCellValue('D10', $tinhNTNFormat);

		$sheet->insertNewRowBefore($currow+2,$numrow-1); 
		foreach ($result as $value) {
			$currow++;
			$stt = $value['stt'];
			$ma = $value['ma'];
			$ten = $value['tendonvi'];
			$sdt = $value['sdt'];
			$daidien = $value['nguoidaidien'];
			$ghichu = $value['ghichu'];
			$sheet->setCellValue('A'.$currow, $stt);
			$sheet->setCellValue('B'.$currow, $ma);
			$sheet->setCellValue('C'.$currow, $ten);
			$sheet->setCellValue('D'.$currow, $sdt);
			$sheet->setCellValue('E'.$currow, $daidien);
			$sheet->setCellValue('F'.$currow, $ghichu);
		}
		ob_clean();
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="danhmucdonvi.xls"');
		$objWriter->save('php://output');
?>