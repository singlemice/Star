<?php
$action=$_REQUEST['action'];
require_once(realpath(dirname(__FILE__)."/db.php"));
require_once(realpath(dirname(__FILE__)."/session.php"));
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$preurl=$_SERVER['HTTP_REFERER'];
echo $preurl;
if ($action=='adduser')
{
	$username=trim($_POST['username']);
	$passwd=md5(trim($_POST['passwd']));
	$realname=trim($_POST['realname']);
	$department=trim($_POST['department']);
	$role=trim($_POST['roles']);
	$sql="select count(*) from user where username='".$username."';";
	$result=mysqli_query($dbc,$sql);
	if($result)
	{
		$error_code="00001";
		$error_message="用户已存在";
		$_SESSION['preurl=']=$preurl;
		echo "<script>window.location =\"../error.php?error_code=".$error_code."\";</script>";		
	}
	else
	{
	$sql="insert into users(username,passwd,realname,role,department) values ('".$username."','".$passwd."','".$realname."',".$role.",".$department.");";
	echo $sql;
	$result=mysqli_query($dbc,$sql)or die("Error inserting to Mysql Server");
	echo "<script>window.location =\"../system.php?action=listusers\";</script>";
	}
//	$result=mysqli_query();
}