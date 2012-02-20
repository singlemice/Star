<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
//$dbc=mysql_connect('localhost','root','mysql');
//mysql_select_db($dbc,'star');
$dbc=mysqli_connect('localhost','root','mysql','star');
mysqli_set_charset($dbc,"utf8");
//$sql="select * from detail;";
$sql="select distinct(name) from detail;";
$result=mysqli_query($dbc,$sql);
$a=mysqli_fetch_fields($result);

///print_r($a);
echo "<br/><br/><br/><br/><br/><br/><br/>";

$aCol=array();
while ($row=mysqli_fetch_array($result))
{
	print_r($row);
	echo "<br/>";
	echo $row[0];
	echo "<br/>";
	$aCol[]=$row[0];
	echo "<br/>";
}
echo "<br/>";
echo "<br/>";
echo "<br/>";
print_r($aCol);


$sql2="select project ,date ";
$sql_month_sum="select date ";
for ($i=0;$i<count($aCol);$i++)
{
$sql2=$sql2.",(case name when '".$aCol[$i]."' then num else 0  end) as '".$aCol[$i]."'";
$sql_month_sum=$sql_month_sum.",(case name when '".$aCol[$i]."' then num else 0  end) as '".$aCol[$i]."'";
}
$sql2=$sql2." from detail  group by project;";
$sql_month_sum=$sql_month_sum."from detail  group by date;";

echo $sql2;
echo "<br/>=====================";
echo "<br/>";
echo "<br/>";
echo $sql_month_sum;
$result2=mysqli_query($dbc,$sql2);

print_r($result2);
echo "<br/>";
echo "<br/>";
$aTotal=count($aCol);
echo $aTotal;
while($row2=mysqli_fetch_array($result2))
{
	$rs=array();
//for($i=0;$i<$aTotal;$i++)
//{
echo "<br/>";
  print_r($row2);
//}
}
//$sql=concat('select ');
mysqli_close($dbc);
?>
</body>
</html>