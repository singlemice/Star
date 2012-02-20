<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript"  src="media/js/jquery.js"></script>
</head>
<body>
<?php 
require_once(realpath(dirname(__FILE__)."./config/db.php"));
require_once(realpath(dirname(__FILE__)."./config/session.php"));
$ID=$_REQUEST["id"];
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$sql="select * from pay_detail where id=".$ID." order by id;";
//
echo $sql;
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");

?>
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="1px">
  <tr>
    <td width="5%" align="center" valign="middle">序号</td>
    <td width="5%" align="center" valign="middle">月份</td>
    <td width="5%" align="center" valign="middle">类型</td>
    <td width="14%" align="center" valign="middle">日期</td>
    <td width="7%" align="center" valign="middle">部门名称</td>
    <td width="10%" align="center" valign="middle">项目</td>
    <td width="13%" align="center" valign="middle">内容摘要</td>
    <td width="8%" align="center" valign="middle">金额</td>
    <td width="8%" align="center" valign="middle">造表人</td>
    <td width="5%" align="center" valign="middle">状态</td>
    <td width="5%" align="center" valign="middle">签 字</td>
    <td width="8%" align="center" valign="middle">备注</td>
     <td width="7%" align="center" valign="middle">操作</td>
  </tr>
  <?php while($row=mysqli_fetch_array($result)){?>
  <tr>
    <td><?php echo $row['ID'];?></td>
    <td><?php echo $row['pay_month'];?></td>
    <td><?php echo $row['pay_type'];?></td>
    <td><?php echo $row['pay_date'];?></td>
    <td><?php echo $row['pay_part'];?></td>
    <td><?php echo $row['pay_project'];?></td>
    <td><?php echo $row['pay_content'];?></td>
    <td><?php echo $row['pay_num'];?></td>
    <td><?php echo $row['pay_creator'];?></td>
    <td><?php  if (trim($row['pay_state'])=="1") {echo "已结";} else {echo "未结";}?></td>
    <td><?php echo $row['pay_sign'];?></td>
    <td><?php echo $row['pay_remarks'];?></td>
    <td>修改 结算</td>
  </tr>
  <?php }?>
</table>
<?php 
mysqli_close($dbc);
?>
</body>
</html>

