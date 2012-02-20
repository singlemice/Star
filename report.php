<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付明细报表</title>
<?php 
require_once(realpath(dirname(__FILE__)."./config/funtion.php"));
?>
</head>

<body>
<?php
$sql="select distinct(teacher) from fee order by teacher;";
$acol=report_row_to_col($dbc,$sql);

$data=report_get_rows($dbc,$acol);

echo $data;





	
	
	
//print_r(json_encode($result));
/*
//$acols=mysqli_fetch_fields($result);
//$t_acols=count($acols);
echo $t_acols;
echo "==================================";
print_r($acols);
for($i=0;$i<$t_acols;$i++)
{
	echo $a->name;
}
*/

?>
</body>
</html>
