<?php
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));
$username=trim($_REQUEST['username']);
$passwd=md5(trim($_REQUEST['password']));
echo $username."________".$passwd;
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$sql="select * from users,role where username='".$username."' and passwd='".$passwd."' and users.role=role.id;";
//echo "<br/>";
//echo $sql;
//echo "<br/>";
$result=mysqli_query($dbc,$sql) or die("Error select into Mysql DB");
//print_r($result);
$flag=mysqli_num_rows($result);
$aResultTotal = mysqli_fetch_array($result);
$iTotal = $aResultTotal[0];
$username=$aResultTotal["username"];
$realname=$aResultTotal["realname"];
$role=$aResultTotal["role"];
$code=$aResultTotal["code"];
echo $username.$code;

if($flag==1)
{
	$_SESSION["login_status"]=1;
	$_SESSION["username"]=$username;
	$_SESSION["realname"]=$realname;
	$_SESSION["role"]=$role;
	$_SESSION["code"]=$code;

	echo "<script>window.location =\"index.php\";</script>";
}
else
{
	echo "<script>window.location =\"login.html\";</script>";
}
mysqli_close($dbc);
?>