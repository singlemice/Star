<?php
// Test CVS
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));
require_once 'Excel/reader.php';
$action=$_REQUEST['action'];
$type=trim($_REQUEST['type']);

if($type=="insert")
{
	$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
}
function excelTime($date, $time = false) {
	if(function_exists('GregorianToJD')){
		if (is_numeric( $date )) {
			$jd = GregorianToJD( 1, 1, 1970 );
			$gregorian = JDToGregorian( $jd + intval ( $date ) - 25569 );
			$date = explode( '/', $gregorian );
			$date_str = str_pad( $date [2], 4, '0', STR_PAD_LEFT )
			."-". str_pad( $date [0], 2, '0', STR_PAD_LEFT )
			."-". str_pad( $date [1], 2, '0', STR_PAD_LEFT )
			. ($time ? " 00:00:00" : '');
			return $date_str;
		}
	}else{
		$date=$date>25568?$date+1:25569;
		/*There was a bug if Converting date before 1-1-1970 (tstamp 0)*/
		$ofs=(70 * 365 + 17+2) * 86400;
		$date =  date("Y-m-d",($date * 86400) - $ofs).($time ? " 00:00:00" : '');
	}
	return $date;
}

// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();
/* Total data set length */
$iTotal = 0;
$iFilteredTotal=5;
$sLengthMenu=25;
$iDisplayLength=25;
$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"iDisplayLength"=>$iDisplayLength,
		"aaData" => array()
);

// Set output Encoding.
$data->setOutputEncoding('UTF-8');

/***
* if you want you can change 'iconv' to mb_convert_encoding:
* $data->setUTFEncoder('mb');
*
**/

/***
* By default rows & cols indeces start with 1
* For change initial index use:
* $data->setRowColOffset(0);
*
**/



/***
*  Some function for formatting output.
* $data->setDefaultFormat('%.2f');
* setDefaultFormat - set format for columns with unknown formatting
*
* $data->setColumnFormat(4, '%.3f');
* setColumnFormat - set format for column (apply only to number fields)
*
**/
if(trim($action)=='detail')
{
$data->read(trim($_SESSION['filepath']));

//$data->read("data/20120213053156_111.xls");
}
elseif(trim($action)=='workingtime')
{
$data->read(trim($_SESSION['filepath']));
//	$data->read("data/20120211114539_222.xls");
}

/*


 $data->sheets[0]['numRows'] - count rows
 $data->sheets[0]['numCols'] - count columns
 $data->sheets[0]['cells'][$i][$j] - data from $i-row $j-column

 $data->sheets[0]['cellsInfo'][$i][$j] - extended info about cell
    
    $data->sheets[0]['cellsInfo'][$i][$j]['type'] = "date" | "number" | "unknown"
        if 'type' == "unknown" - use 'raw' value, because  cell contain value with format '0.00';
    $data->sheets[0]['cellsInfo'][$i][$j]['raw'] = value if cell without format 
    $data->sheets[0]['cellsInfo'][$i][$j]['colspan'] 
    $data->sheets[0]['cellsInfo'][$i][$j]['rowspan'] 
*/

//error_reporting(E_ALL ^ E_NOTICE);
$iTotal=$data->sheets[0]['numRows'];
if ($action=='detail')
{
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	$row = array();
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		//echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
		if($j == 3)
		{
		$row[]=	excelTime($data->sheets[0]['cells'][$i][$j],false);
		}
		elseif($j == 6)
		{
			if (trim(addslashes($data->sheets[0]['cells'][$i][$j]))=="")
			{
				$row[]=0;
			}
			else
			{
				$row[]=addslashes($data->sheets[0]['cells'][$i][$j]);
			}
		}
 	elseif($j==9&&$type=="insert")
		{
			if(trim(addslashes($data->sheets[0]['cells'][$i][$j]))=="已结")
			{
				$row[]="1";
			}
			else {
				$row[]="0";
			}
		}
		 
		else
		{
		$row[]=addslashes($data->sheets[0]['cells'][$i][$j]);
		}
		
		
		
	}
	
	if($type=="insert")
	{
		$sql="insert into pay_detail (pay_type,pay_part,pay_project,pay_content,pay_num,pay_creator,pay_state,pay_remarks,pay_date) values (";
		$sql=$sql."'".$row[1]."','".$row[3]."','".$row[4]."','".$row[5]."',".$row[6].",'".$row[7]."','".$row[8]."','".$row[9]."','".$row[2]."');";
		//echo $sql;
		$result=mysqli_query($dbc,$sql) or die( mysqli_error($dbc));
	}
	else {
		$output['aaData'][] = $row;
	}
}
}
elseif ($action=='workingtime')
{
	for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
		$row = array();
		for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
			//echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
			if($j == 1)
			{
				$row[]=	excelTime($data->sheets[0]['cells'][$i][$j],false);
			}
			else
			{
				if (($j== 5)||($j== 6)||($j== 7)||($j== 8))
				{
					if (trim(addslashes($data->sheets[0]['cells'][$i][$j]))=="")
					{
						$row[]=0;
					}
					else 
					{
						$row[]=addslashes($data->sheets[0]['cells'][$i][$j]);
					}
				}
				else
				{
					$row[]=addslashes($data->sheets[0]['cells'][$i][$j]);
				}
			}
		}
		if($type=="insert")
		{
			$sql="insert into working (date,working,project,name,workload,cost,Subsidy,num,payment,remark)values ('";
			$sql=$sql.$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."',".$row[4].",".$row[5].",".$row[6].",".$row[7].",'".$row[8]."','".$row[9]."');";
			
			$result=mysqli_query($dbc,$sql) or die( mysqli_error($dbc));
		//echo	$sql."<br/>";	
		}
		else 
		{
		$output['aaData'][] = $row;
		}
	}
}
echo json_encode( $output );

if($type=="insert")
{
	
	mysqli_close($dbc);
	if($action=='detail')
	{
		echo "<script>window.location =\"listall.php\";</script>";
	}
	elseif($action=='workingtime')
	{
		echo "<script>window.location =\"Working.php?action=listworking\";</script>";
	}
	else {
		echo "<script>window.location =\"index.php\";</script>";
	}
}

//print_r($data);
//print_r($data->formatRecords);
?>
