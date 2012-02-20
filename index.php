<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="img/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"  src="media/js/jquery.js"></script>

<title>登录</title>
<?php 
require_once(realpath(dirname(__FILE__)."/config/session.php"));
if(!isset($_SESSION["login_status"]))
{
	echo "<script>window.location =\"login.html\";</script>";
}
else {
	echo "<script>window.location =\"listall.php\";</script>";
}
?>
</head>
<body>
<div id="container">
<div id="menu">
<?php 

include './menu.php';

?>
</div>
</div>
</body>
</html>