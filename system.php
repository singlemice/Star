<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户</title>
<?php 
require_once(realpath(dirname(__FILE__)."./config/funtion.php"));
$action=trim($_REQUEST['action']);
?>
</head>
	<style type="text/css" title="currentStyle">
			@import " ./media/css/demo_page.css";
			@import " ./media/css/demo_table.css";
			@import " ./css/main.css";
		</style>
		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script language="javascript">
function check() {
if (document.form1.username.value=="") {
alert("用户名不能为空");
return false;
}
if (document.form1.realname.value=="") {
	alert("真实姓名不能为空");
	return false;
	}
if (document.form1.passwd.value=="") {
alert("密码不能为空");
return false;
}
if (document.form1.passwd2.value=="") {
alert("重复密码不能为空");
return false;
}

if (document.form1.passwd.value!=document.form1.passwd2.value) {
alert("两次输入的密码不相同");
return false;
}
document.form1.submit();
}
</script>
<body>
		<div class="menu_2">
<?php include './menu.php';?>
</div>

<div class="container_edit">
<?php if ($action=="adduser"){?>
<form id="form1" name="form1" method="post" action="config/system_action.php?action=adduser">

  <table width="629" border="1">
    <tr>
      <td>用户名：</td>
      <td><label>
      <input type="text" name="username" id="username" />
    </label></td>
      <td>姓名：</td>
      <td><label>
      <input type="text" name="realname" id="realname" />
    </label></td>
    </tr>
    <tr>
      <td>密码：</td>
      <td><input type="password" name="passwd" id="passwd" /></td>
      <td>
        确认密码： </td>
      <td><input type="password" name="passwd2" id="passwd2" /></td>
    </tr>
    <tr>
      <td>部门：</td>
      <td><label>
      <select name="department" id="department">
      <?php display_department($dbc); ?>
      </select>
    </label></td>
      <td>角色</td>
      <td><label>
      <select name="roles" id="roles">
      <?php echo display_roles($dbc);?>
      </select>
    </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="submit" onclick="return check();"  value="提交" />
        <label>
          <input type="reset" name="reset" id="reset" value="重置" />
        </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

</form>
<?php 
}
elseif($action=='listuser')
{
?>
<table width="629" border="1">
  <tr>
    <td>序号</td>
    <td>用户名</td>
    <td>姓名</td>
    <td>部门</td>
    <td>角色</td>
  </tr>
<?php display_users($dbc);?>
</table>
<?php 	
}
elseif($action=='addrole' || $action=='listrole')
{
	?>
    <form action="config/system_action.php?action=addrole" method="post">
      角色：
      <label>
        <input type="text" name="role" id="role" />
      </label>
      code:
      <label>
        <input type="text" name="textfield" id="textfield" />
      </label>
      <label>
        <input type="submit" name="submit2" id="submit2" value="提交" />
      </label>
  </form>
	<table width="629" border="1">
  <tr>
    <td>序号</td>
    <td>角色</td>
    <td>CODE</td>
  </tr>
<?php 
$flag="system";
display_roles($dbc,$flag);?>
</table>
	<?php 
}
elseif($action=='changepwd')
{
	?>
	<?php 
}
?>
</div>

</body>
<?php mysqli_close($dbc);?>
</html>
