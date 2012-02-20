<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑数据</title>
<script type="text/javascript"  src="media/js/jquery.js"></script>
<style type="text/css" title="currentStyle">
			@import " ./media/css/demo_page.css";
			@import " ./media/css/demo_table.css";
			@import " ./css/main.css";
		</style>
</head>

<body>
<?php 
require_once(realpath(dirname(__FILE__)."./payDetail.php"));
require_once(realpath(dirname(__FILE__)."./config/db.php"));
require_once(realpath(dirname(__FILE__)."./config/session.php"));

$id=$_REQUEST['id'];
if ($_REQUEST['action']=="modify")
{
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
$sql="select * from pay_detail where id=".$id.";";
$result=mysqli_query($dbc,$sql) or die("Error inserting into Mysql DB");
$rownum=$result->num_rows;
//if ($rownum != 1) {die ("query Error;");} else {echo "ok";}
$row=mysqli_fetch_array($result);

mysqli_close($dbc);
$_SESSION["row"]=$row;
//var_dump($_SESSION);

//echo "<script>window.location =\"listall.php\";</script>";

//echo $_SESSION["row"]["pay_type"];
}
if($_REQUEST['action']=='post')
{
	//var_dump($_SESSION);
	$sql_update="update pay_detail set  ";
	$_pd=new payDetail();
	$_pd->setPayType(trim(addslashes($_POST['payType']))); //支付类型
	$_pd->setPayContent(trim(addslashes($_POST['payContent']))); //摘要
	$_pd->setPayMonth( trim(addslashes($_POST['payMonth']))); //帐期
	$_pd->setPayPart(trim(addslashes($_POST['payPart'])));//部门
	$_pd->setPayNum(trim(addslashes($_POST['payNum'])));//金额
	$_pd->setPayProject(trim(addslashes($_POST['payProject'])));//项目
	$_pd->setPayCreator(trim(addslashes($_POST['payCreator'])));//建表人
	$_pd->setPayRemark(trim(addslashes($_POST['payRemark'])));//备注
	$_pd->setPayState(trim(addslashes($_POST['payState'])));//支付状态
	
	if (trim(addslashes($_SESSION["row"]["pay_type"]))!= $_pd->getPayType())
	{
		$flag=0;
		$sql_update=$sql_update." pay_type='".$_pd->getPayType()."'";
		$flag=1;
	}
	
	if (trim(addslashes($_SESSION["row"]["pay_content"]))!= $_pd->getPayContent())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_content='".$_pd->getPayContent()."'";
		$flag=1;
		}
		else 
		{
			$sql_update=$sql_update.", pay_content='".$_pd->getPayContent()."'";
		}
			
	}
	
	if (trim(addslashes($_SESSION["row"]["pay_month"]))!= $_pd->getPayMonth())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_month='".$_pd->getPayMonth()."'";
		$flag=1;
		}
		else
		{
			$sql_update=$sql_update.", pay_month='".$_pd->getPayMonth()."'";
		}
	}
	
	if (trim(addslashes($_SESSION["row"]["pay_project"]))!= $_pd->getPayProject())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_project='".$_pd->getPayProject()."'";
		$flag=1;
		}
		else
		{
			$sql_update=$sql_update.", pay_project='".$_pd->getPayProject()."'";
		}
	}
	if (trim(addslashes($_SESSION["row"]["pay_part"]))!= $_pd->getPayPart())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_part='".$_pd->getPayPart()."'";
		$flag=1;
		}
		else
		{
			$sql_update=$sql_update.", pay_part='".$_pd->getPayPart()."'";
		}
	}
	if (trim(addslashes($_SESSION["row"]["pay_num"]))!= $_pd->getPayNum())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_num='".$_pd->getPayNum()."'";
		$flag=1;
		}
		else
		{
			$sql_update=$sql_update.", pay_num='".$_pd->getPayNum()."'";
		}
	}
	if (trim(addslashes($_SESSION["row"]["pay_creator"]))!= $_pd->getPayCreator())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_creator='".$_pd->getPayCreator()."'";
		$flag=1;
		}
		else
		{
			$sql_update=$sql_update.", pay_creator='".$_pd->getPayCreator()."'";
		}
	}
	if (trim(addslashes($_SESSION["row"]["pay_remarks"]))!= $_pd->getPayRemark())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_remarks='".$_pd->getPayRemark()."'";
		$flag=1;
		}
		else
		{
			$sql_update=$sql_update.", pay_remarks='".$_pd->getPayRemark()."'";
		}
	}
	if (trim(addslashes($_SESSION["row"]["pay_state"]))!= $_pd->getPayState())
	{
		if($flag==0)
		{
		$sql_update=$sql_update." pay_state='".$_pd->getPayState()."'";
		$flag=1;
		}
		else
		{
			$sql_update=$sql_update.", pay_state='".$_pd->getPayState()."'";
		}
	}
	
	$sql_update=$sql_update." where id=".$_SESSION["row"]["ID"].";";
//	echo $sql_update;
	$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");	
	$result=mysqli_query($dbc,$sql_update) or die("Error inserting into Mysql DB");
	mysqli_close($dbc);
	echo "<script>window.location =\"listall.php\";</script>";
}

?>
<div class="menu_2">
<?php include './menu.php';?>
</div>
<div class="container_edit">

<form id="form1" name="form1" method="post" action="editDetail.php?action=post&id=<?php echo $id;?>" on>
<table width="600px" border="0" align="center" cellspacing="0px">
  <tr>
    <td width="45">类型</td>
    <td width="114">
        <input type="text" name="payType" id="payType" value="<?php echo $row['pay_type']?>"/>
    </td>
    <td width="45">日期</td>
    <td width="170"><?php echo $row['pay_date']?></td>
  </tr>
  <tr>
    <td width="45">部门</td>
    <td><label>
      <input type="text" name="payPart" id="payPart" value=<?php echo $row['pay_part']?>  />
    </label></td>
    <td width="45">项目</td>
    <td><label>
      <input type="text" name="payProject" id="payProject" value=<?php echo $row['pay_project']?>  />
    </label></td>
  </tr>
  <tr>
    <td width="45">摘要</td>
    <td colspan="3"><textarea name="payContent" id="payContent" cols="45" rows="5"  ><?php echo $row['pay_content']?></textarea></td>
    </tr>
  <tr>
    <td width="45">金额</td>
    <td><input type="text" name="payNum" id="payNum" value="<?php echo $row['pay_num']?>"/></td>
    <td width="45">造表人</td>
    <td><label>
      <input type="text" name="payCreator" id="payCreator" value="<?php echo $row['pay_creator']?>"/>
    </label></td>
  </tr>
  <tr>
  <td ="45">支付状态</td>
  <td><label>
    <select name="payState" size="1" id="payState">
      <option value="0" <?php if (trim($row['pay_state'])!="1") { ?> selected="selected" <?php }?>  >未支付</option>
      <option value="1" <?php if (trim($row['pay_state'])=="1") { ?> selected="selected" <?php }?> >已支付</option>
    </select>
  </label></td>
    <td width="45">帐期</td>
    <td><label>
      <select name="payMonth" size="1" id="payMonth">
        <option value="一月" <?php if ($row['pay_month']=='一月') { ?> selected="selected" <?php }?>>一月</option>
        <option value="二月" <?php if ($row['pay_month']=='二月') { ?> selected="selected" <?php }?>>二月</option>
        <option value="三月" <?php if ($row['pay_month']=='三月') { ?> selected="selected" <?php }?>>三月</option>
        <option value="四月" <?php if ($row['pay_month']=='四月') { ?> selected="selected" <?php }?>>四月</option>
        <option value="五月" <?php if ($row['pay_month']=='五月') { ?> selected="selected" <?php }?>>五月</option>
        <option value="六月" <?php if ($row['pay_month']=='六月') { ?> selected="selected" <?php }?>>六月</option>
        <option value="七月" <?php if ($row['pay_month']=='七月') { ?> selected="selected" <?php }?>>七月</option>
        <option value="八月" <?php if ($row['pay_month']=='八月') { ?> selected="selected" <?php }?>>八月</option>
        <option value="九月" <?php if ($row['pay_month']=='九月') { ?> selected="selected" <?php }?>>九月</option>
        <option value="十月" <?php if ($row['pay_month']=='十月') { ?> selected="selected" <?php }?>>十月</option>
        <option value="十一月" <?php if ($row['pay_month']=='十一月') { ?> selected="selected" <?php }?>>十一月</option>
        <option value="十二月" <?php if ($row['pay_month']=='十二月') { ?> selected="selected" <?php }?>>十二月</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td width="45">备注</td>
    <td colspan="3"><label>
      <textarea name="payRemark" id="payRemark" cols="45" rows="5" ><?php echo $row['pay_remarks'];?></textarea>
    </label></td>
    </tr>
   <tr>
    <td colspan="4"> 
      <input type="submit" name="submit" id="submit" value="修改" />
     </td>
    </tr> 
</table>
</form>
</div>
</body>
</html>
