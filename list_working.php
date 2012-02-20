<?php
//echo $_SERVER['DOCUMENT_ROOT'];
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));
$aColumns = array( '序号', '日期', '项目','工作内容', '姓名', '工作量','费用标准','补贴','金额','结账方式','备注' );
$sIndexColumn = "ID";
$aDBColumns = array('ID','date','project','working','name','workload','cost','Subsidy','num','payment','remark');
$dbc=mysqli_connect("10.60.1.196",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");


/* Total data set length */
$sQuery = "
SELECT COUNT(`".$sIndexColumn."`)
FROM   working
";
$rResultTotal = mysqli_query($dbc, $sQuery ) or die(mysqli_error());
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];



$sql="select ID,DATE_FORMAT(date,'%Y-%m-%d') as date,project,working,name,workload,cost,Subsidy,num,payment,remark from working order by id desc;";
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");




$iFilteredTotal=5;
/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = mysqli_fetch_array( $result ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aDBColumns) ; $i++ )
		{
			// echo $aDBColumns[$i];
				/* General output */
				$row[] = $aRow[ $aDBColumns[$i] ];
			
		}
		$output['aaData'][] = $row;
	}
	mysqli_free_result($result);
	mysqli_close($dbc);
	echo json_encode( $output );
	
?>