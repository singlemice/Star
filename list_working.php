<?php
//echo $_SERVER['DOCUMENT_ROOT'];
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));

$start=$_REQUEST["start"];
$limit=$_REQUEST["limit"];
$aColumns = array( '序号', '日期', '项目','费用类型','工作内容', '姓名', '工作量','费用标准','补贴','金额','结账方式','备注','owner','timeflag','打印','经手人' );
$sIndexColumn = "ID";
$aDBColumns = array('ID','date','project','fee_type','working','name','workload','cost','Subsidy','manual_num','num','payment','remark','owner','timeflag','billno','is_print','payCreator');
$dbc=mysqli_connect("$db_host",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");


/* Total data set length */
$sQuery = "
SELECT COUNT(`".$sIndexColumn."`)
FROM   working where invalid=0
";
$rResultTotal = mysqli_query($dbc, $sQuery ) or die(mysqli_error());
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];


	if (trim ( $_REQUEST ['action'] ) == "record") {
	$sql="select ID,DATE_FORMAT(date,'%Y-%m-%d') as date,project,fee_type,working,name,workload,cost,Subsidy,manual_num,num,payment,remark ,owner,timeflag,billno,is_print,payCreator from working  where invalid=0 and billno is null order by id desc  ;";
	}
	elseif (trim ( $_REQUEST ['action'] ) == "bill") 
	{
//	$billno=$_REQUEST ["billno"];
//	$sql="select ID,DATE_FORMAT(date,'%Y-%m-%d') as date,project,fee_type,working,name,workload,cost,Subsidy,manual_num,num,payment,remark ,owner,timeflag,billno,is_print,payCreator from working  where invalid=0 and billno=".$billno." order by id desc  ;";
	$sql="select ID,DATE_FORMAT(date,'%Y-%m-%d') as date,project,fee_type,working,name,workload,cost,Subsidy,manual_num,num,payment,remark ,owner,timeflag,billno,is_print,payCreator from working  where invalid=0 and billno is not null order by id desc  ;";
	}
	elseif (trim ( $_REQUEST ['action'] ) == "listbillno") 
	{

	$sql="select distinct(billno) from working  where billno is not null  order by billno desc ;";
	}
	else{
	$sql="select ID,DATE_FORMAT(date,'%Y-%m-%d') as date,project,fee_type,working,name,workload,cost,Subsidy,manual_num,num,payment,remark ,owner,timeflag,billno,is_print,payCreator from working  where invalid=0 order by id desc  limit ".$start.",".$limit .";";
	}
	

//echo $sql;
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");

//echo $sql;


$iFilteredTotal=5;
/*
	 * Output
	 */
	$output = array(
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"detailData" => array()
	);
if (trim ( $_REQUEST ['action'] ) == "listbillno") 
{
while ( $aRow = mysqli_fetch_array( $result ) )
	{
		$row = array();
	
			// echo $aDBColumns[$i];
				/* General output */
				$row['billno'] = $aRow[ 'billno'];
			

		$output['detailData'][] = $row;
	}
}
else
{	
	while ( $aRow = mysqli_fetch_array( $result ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aDBColumns) ; $i++ )
		{
			// echo $aDBColumns[$i];
				/* General output */
				$row[$aDBColumns[$i]] = $aRow[ $aDBColumns[$i] ];
			
		}
		$output['detailData'][] = $row;
	}
	
	}
	mysqli_free_result($result);
	mysqli_close($dbc);
	echo json_encode( $output );

?>