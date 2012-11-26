<?php
require_once './Classes/PHPExcel.php';
require_once './Classes/PHPExcel/IOFactory.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
$objPHPExcel->setActiveSheetIndex(0);



// 列宽
//$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(9);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(7);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(6);
// 行高
for($i = 2; $i <= 17; $i++)
{
	$objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(14.25);
}

$objPHPExcel->getActiveSheet()->setCellValue('A1', '日期');
$objPHPExcel->getActiveSheet()->setCellValue('B1', '项目');
$objPHPExcel->getActiveSheet()->setCellValue('C1', '费用类型');
$objPHPExcel->getActiveSheet()->setCellValue('D1', '工作内容');
$objPHPExcel->getActiveSheet()->setCellValue('E1', '姓名');
$objPHPExcel->getActiveSheet()->setCellValue('F1', '工作量');
$objPHPExcel->getActiveSheet()->setCellValue('G1', '费用标准');
$objPHPExcel->getActiveSheet()->setCellValue('H1', '补贴');
$objPHPExcel->getActiveSheet()->setCellValue('I1', '手工金额');
$objPHPExcel->getActiveSheet()->setCellValue('J1', '金额');
$objPHPExcel->getActiveSheet()->setCellValue('K1', '备注');

$objPHPExcel->getActiveSheet()->setCellValue('A2', '2012-01-03');
$objPHPExcel->getActiveSheet()->setCellValue('B2', 'CCC费用类型费用类型费用类型费用类型费用类型费用类型费用类型');
$objPHPExcel->getActiveSheet()->setCellValue('C2', '课酬课酬课酬课酬课酬课酬课酬课酬');
$objPHPExcel->getActiveSheet()->setCellValue('D2', '劳动劳动劳动劳动劳动劳动劳动劳动劳动');
$objPHPExcel->getActiveSheet()->setCellValue('E2', '姓名');
$objPHPExcel->getActiveSheet()->setCellValue('F2', '10');
$objPHPExcel->getActiveSheet()->setCellValue('G2', '100');
$objPHPExcel->getActiveSheet()->setCellValue('H2', '2000');
$objPHPExcel->getActiveSheet()->setCellValue('I2', '5000');
$objPHPExcel->getActiveSheet()->setCellValue('J2', '10000');
$objPHPExcel->getActiveSheet()->setCellValue('k2', '备注');





$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('01月费用明细');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('PHPExcel.xls');
?>