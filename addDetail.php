<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript"  src="media/js/jquery.js"></script>
<style type="text/css" title="currentStyle">
			@import " ./media/css/demo_page.css";
			@import " ./media/css/demo_table.css";
			@import " ./css/main.css";
		</style>
</head>

<?php 
require_once(realpath(dirname(__FILE__)."./payDetail.php"));
require_once(realpath(dirname(__FILE__)."./config/db.php"));
require_once(realpath(dirname(__FILE__)."./config/session.php"));

$_action=$_REQUEST['action'];





if($_action=='post')
{
	$_pd=new payDetail();
	$_pd->setPayType(addslashes($_POST['payType']));
$_pd->setPayContent(addslashes($_POST['payContent']));
//$_pd->setPayMonth( ($_POST['payMonth']));
$_pd->setPayPart(addslashes($_POST['payPart']));
$_pd->setPayNum(addslashes($_POST['payNum']));
$_pd->setPayProject(addslashes($_POST['payProject']));
$_pd->setPayCreator(addslashes($_POST['payCreator']));
$_pd->setPayRemark(addslashes($_POST['payRemark']));
$_pd->setPayState(addslashes($_POST['payState']));
//echo $_pd->getPayMonth()."<br/>";
$sql="insert into pay_detail (pay_type,pay_month,pay_part,pay_project,pay_content,pay_num,pay_creator,pay_remarks,pay_state,pay_date,owner,createtime) values (";
//$sql=$sql."pay_type='".$_pd->getPayType()."',pay_month='".$_pd->getPayMonth()."',pay_part='".$_pd->getPayPart();
//$sql=$sql."',pay_project='".$_pd->getPayProject()."',pay_content='".$_pd->getPayContent()."',pay_num=".$_pd->getPayNum();
//$sql=$sql.",pay_creator='".$_pd->getPayCreator()."',pay_remarks='".$_pd->getPayRemark()."',pay_state='".$_pd->getPayState()."',pay_date=now());";
$sql=$sql."'".$_pd->getPayType()."','".$_pd->getPayMonth()."','".$_pd->getPayPart();
$sql=$sql."', '".$_pd->getPayProject()."', '".$_pd->getPayContent()."', ".$_pd->getPayNum();
$sql=$sql.", '".$_pd->getPayCreator()."', '".$_pd->getPayRemark()."', '".$_pd->getPayState()."',now(),'".$_SESSION['realname']."', now());";
//echo $sql;
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");

	$result=mysqli_query($dbc,$sql) ;//or die("Error inserting into Mysql DB");
/* 	echo $result;
	echo mysqli_error($dbc);
echo $result; */

mysqli_close($dbc);
echo "<script>window.location =\"listall.php\";</script>";

}
else 
{
?>

<body>
<div class="menu_2">
<?php include './menu.php';?>
</div>
<div class="container_edit">
<form id="form1" name="form1" method="post" action="addDetail.php?action=post" >
<table width="600px" border="0" align="center" cellspacing="0px">
  <tr>
    <td width="45">类型</td>
    <td width="114">
        <input type="text" name="payType" id="payType" />
    </td>
    <td width="45">日期</td>
    <td width="170"><label>
      <input type="text" name="payDate" id="payDate" />
    </label></td>
  </tr>
  <tr>
    <td width="45">部门</td>
    <td><label>
      <input type="text" name="payPart" id="payPart" />
    </label></td>
    <td width="45">项目</td>
    <td><label>
      <input type="text" name="payProject" id="payProject" />
    </label></td>
  </tr>
  <tr>
    <td width="45">摘要</td>
    <td colspan="3"><textarea name="payContent" id="payContent" cols="45" rows="5"></textarea></td>
    </tr>
  <tr>
    <td width="45">金额</td>
    <td><input type="text" name="payNum" id="payNum" /></td>
    <td width="45">造表人</td>
    <td><label>
      <input type="text" name="payCreator" id="payCreator" />
    </label></td>
  </tr>
  <tr>
  <td width="45">支付状态</td>
  <td><label>
    <select name="payState" size="1" id="payState">
      <option value="0" selected="selected">未支付</option>
      <option value="1">已支付</option>
    </select>
  </label></td>
  <!--  
    <td width="45">帐期</td>
    <td><label>
      <select name="payMonth" size="1" id="payMonth">
        <option value="一月">一月</option>
        <option value="二月">二月</option>
        <option value="三月">三月</option>
        <option value="四月">四月</option>
        <option value="五月">五月</option>
        <option value="六月">六月</option>
        <option value="七月">七月</option>
        <option value="八月">八月</option>
        <option value="九月">九月</option>
        <option value="十月">十月</option>
        <option value="十一月">十一月</option>
        <option value="十二月">十二月</option>
      </select>
    </label></td>-->
  </tr>
  <tr>
    <td width="45">备注</td>
    <td colspan="3"><label>
      <textarea name="payRemark" id="payRemark" cols="45" rows="5"></textarea>
    </label></td>
    </tr>
   <tr>
    <td colspan="4"><label>
      <input type="submit" name="submit" id="submit" value="提交" />
      <input type="reset" name="reset" id="reset" value="重置" />
    </label></td>
    </tr> 
</table>
</form>
</div>
<?php 
}

?>
</body>
</html>