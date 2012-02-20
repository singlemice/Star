<?php
echo $_SERVER['DOCUMENT_ROOT'];
require_once(realpath(dirname(__FILE__)."/Star/config/db.php"));
require_once(realpath(dirname(__FILE__)."/Star/config/session.php"));

$aColumns = array( '序号', '月份', '类型', '日期', '部门名称','项目','内容摘要','金额','造表人','状态','签字','备注' );
$sIndexColumn = "ID";

$dbc=mysqli_connect("10.60.1.196",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$sql="select * from pay_detail order by id;";
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");
$iTotal=10;
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
	
	while ( $aRow = mysql_fetch_array( $result ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			
		}
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
	mysqli_close($dbc);
?>