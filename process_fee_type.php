<?php
		require_once (realpath ( dirname ( __FILE__ ) . "./config/db.php" ));
		require_once (realpath ( dirname ( __FILE__ ) . "./config/session.php" ));
		if (trim ( $_POST ['action'] ) == "add") {
$name=trim($_POST['name']);
$value=trim($_POST['value']);
$remark=trim($_POST['remark']);
$sql="insert into fee_type(name,value,remark) values('".$name."','".$value."','".$remark."')";

$dbc = mysqli_connect ( $db_host, $db_user, $db_pwd, $db_name ) or die ( "Error connection to Mysql Server" );
			
			$result = mysqli_query ( $dbc, $sql ); // or die("Error inserting into Mysql
			                                  // DB");
			
			mysqli_close ( $dbc );
			
			
			$data = array ("success" => true, "msg" => "OK" );
			echo json_encode ( $data );
}
elseif (trim ( $_POST ['action'] ) == "") {
$start=$_REQUEST["start"];
$limit=$_REQUEST["limit"];

$sIndexColumn = "ID";
$aDBColumns = array('ID','name','value','remark');
$dbc=mysqli_connect("$db_host",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");


/* Total data set length */
$sQuery = "
SELECT COUNT(`".$sIndexColumn."`)
FROM   working
";
$rResultTotal = mysqli_query($dbc, $sQuery ) or die(mysqli_error());
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];
if($start==""){
$sql="select ID,name,value,remark from fee_type  order by id desc";
}
else{
$sql="select ID,name,value,remark from fee_type  order by id desc  limit ".$start.",".$limit .";";
}
//echo $sql;
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");


	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"detailData" => array()
	);
	
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
	mysqli_free_result($result);
	mysqli_close($dbc);
if($start=="")
{
	$data = array ("success" => true, "msg" => "OK" );
			echo json_encode ( $data );

	}
	else
	{
		echo json_encode( $output );
	}
			
}
elseif(trim ( $_POST ['action'] ) == "delete"){
$ids=$_POST['ids'];
$ids = explode ( ",", $ids );
$where = ' where id in (' . join ( ',', $ids ) . ')';
$sql='delete from fee_type  '.$where;

$dbc = mysqli_connect ( $db_host, $db_user, $db_pwd, $db_name ) or die ( "Error connection to Mysql Server" );
			
			$result = mysqli_query ( $dbc, $sql ); // or die("Error inserting into Mysql
			                                  // DB");
			
			mysqli_close ( $dbc );
			
	$data = array ("success" => true, "msg" => "$sql" );
			echo json_encode ( $data );
}
elseif(trim ( $_POST ['action'] ) == "item"){
$aDBColumns = array('ID','name','value','remark');
$sql="select ID,name,value,remark from fee_type  order by id desc";

$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");


	$output = array(
		"detailData" => array()
	);
	
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
	mysqli_free_result($result);
	mysqli_close($dbc);

			
			mysqli_close ( $dbc );
			
	echo json_encode( $output );
}


?>