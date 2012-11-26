<?php
require_once(realpath(dirname(__FILE__)."/../config/db.php"));
require_once(realpath(dirname(__FILE__)."/../config/session.php"));

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Asia/Shanghai');

/** PHPExcel */
require_once '../class/PHPExcel.php';
/** 报表列字段*/

// Create new PHPExcel object
echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

// Set properties
echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data, we will use printing features
$rep_cols=array("编号","日期","项目","费用类型","工作内容","姓名","工作量","费用标准","补贴","手工金额","金额","结账方式","经手人","备注");
							 
$dbc=mysqli_connect("$db_host",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$sql="select ID,date,project,fee_type,working,name,workload,cost,Subsidy,manual_num,num,payment,payCreator,remark from working";
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");

							 
echo date('H:i:s') . " Add some data\n";
$col_a='A';
$head_0=1;
for($i=1;$i<=sizeof($rep_cols);$i++){
	
	$objPHPExcel->getActiveSheet()->setCellValue($col_a.'1',$rep_cols[$i-1]);
	$col_a++;
}
$rows=mysqli_fetch_lengths($result);
/**记录从第二行开始为开始行**/
$row_num_start=2;
while ( $aRow = mysqli_fetch_array( $result )) {
	$col_a='A';
	for($i=1;$i<=sizeof($rep_cols);$i++){
	
	$objPHPExcel->getActiveSheet()->setCellValue($col_a.$row_num_start,$aRow[$i-1]);
	
	$col_a++;
}
$row_num_start++;
}


// Rename sheet
echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('月份支付明细');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage
echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
echo date('H:i:s') . " Done writing file.\r\n";
mysqli_free_result($result);
	mysqli_close($dbc);
