<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
$_action=trim($_REQUEST['action']);
?>
<form action="upload_file.php?action=<?php echo $_action?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label>
    <input type="file" name="file" id="file" />
  </label>
  <label>
    <input type="submit" name="submit" id="submit" value="提交" />
  </label>
</form>
</body>
</html>
