<?php
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));
$gg= $GLOBALS['HTTP_RAW_POST_DATA'];

$rows=json_decode($gg);
//var_dump(array(json_decode($gg)));
$rows_num=sizeof($rows);
if($rows_num==1){$rows=array($rows);}
$dbc=mysqli_connect("$db_host",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");

for($i=0;$i<$rows_num;$i++){

	$num=$rows[$i]->{'workload'}*$rows[$i]->{'cost'}+$rows[$i]->{'Subsidy'}+$rows[$i]->{'manual_num'};
$sql="update working set project='".$rows[$i]->{'project'}."', fee_type='".$rows[$i]->{'fee_type'}."',";
$sql=$sql." working='".$rows[$i]->{'working'}."', workload=".$rows[$i]->{'workload'}.", cost=".$rows[$i]->{'cost'}.", Subsidy=".$rows[$i]->{'Subsidy'}.", manual_num=".$rows[$i]->{'manual_num'};
$sql=$sql.", num=".$num.",  payment='".$rows[$i]->{'payment'}."', payCreator='".$rows[$i]->{'payCreator'}."'";
$sql=$sql." where ID=".$rows[$i]->{'ID'};
	//echo $sql;
	$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");
}

mysqli_close($dbc);

?>