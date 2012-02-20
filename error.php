<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
		<style type="text/css" title="currentStyle">
			@import " ./media/css/demo_page.css";
			@import " ./media/css/demo_table.css";
			@import " ./css/main.css";
		</style>
</head>

<body>
<div class="container_edit"><br/><br/><br/><br/><br/><br/>
<img src="img/error.gif" width="128" height="128"   />
<?php 
require_once(realpath(dirname(__FILE__)."./config/session.php"));
echo $_REQUEST['error_code']; 
echo "<a href=\"".$_SESSION['preurl=']."\">返回</a>";

?>
</div>
</body>
</html>
