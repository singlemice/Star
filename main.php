<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<?php
require_once(realpath(dirname(__FILE__)."/config/session.php"));
if(!isset($_SESSION["login_status"]))
{
	echo "<script>window.location =\"login.html\";</script>";
}
?>
<link rel="stylesheet" type="text/css" href="extjs/resources/css/ext-all.css" />
<script type="text/javascript" src="extjs/ext-all-debug.js"></script>
<script type="text/javascript" src="app/app.js"></script>
</head>
<body>
<div id='drealname'  style="display:none" ><?php echo $_SESSION["ID"] ?></div>
<div id='dusername'  style="display:none" ><?php echo $_SESSION["username"] ?></div>
</body>
</html>