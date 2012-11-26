<?php
//echo $_SERVER['DOCUMENT_ROOT'];
require_once(realpath(dirname(__FILE__)."/../config/db.php"));
require_once(realpath(dirname(__FILE__)."/../config/session.php"));

$dbc=mysqli_connect("$db_host",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$sql="select distinct(billno) from working  where billno is not null  order by billno desc ;";
//echo $sql;
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");
//echo $sql;

$output = array(
		"detailData" => array()
);

while ( $aRow = mysqli_fetch_array( $result ) )
{
	$row = array();
	$row['billno'] = $aRow[ 'billno'];		

	$output['detailData'][] = $row;
}

mysqli_free_result($result);
mysqli_close($dbc);
echo json_encode( $output );

?>