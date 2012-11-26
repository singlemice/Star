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
<script type="text/javascript">
	var submit = document.getElementById('test');
	var p_head=['类型', '日期', '部门名称','项目','内容摘要','金额','造表人','状态','备注','编辑'];
	var p_id="tb_detail";
    
	function isIE(){ //ie?
	   if (window.navigator.appName.indexOf("Explorer") > -1)
	    return true;
	   else
	    return false;
	}
    var flag=isIE();
		function append_thead(p_id,p_head)
	{
		
	var tb=document.getElementById("tb_detail");  
    var oTHead=tb.createTHead();  
    var oTFoot=tb.createTFoot(); 
	var head_row=document.createElement("tr");
	var tH0=oTHead.insertRow(0);
	var tT0=oTFoot.insertRow(0);

	for(var i=0;i<p_head.length;i++)
	{
		
		var theCell=tH0.insertCell(i)
		var tTCell=tT0.insertCell(i);
		if(isIE())
		{
		theCell.innerText=p_head[i];
		tTCell.innerText=P_head[i];
		}
		else
		{
			theCell.textContent=p_head[i];
			tTCell.textContent=p_head[i];
		
		}	

	}
	
	}
		
    function get_data(form)
    {
       
    var value);=document.getElementById(form);
     var payType=escape(dForm.elements['payType'].value);
     var payDate=escape(dForm.elements['payDate'].value);
     var payPart=escape(dForm.elements['payPart'].value);
     var payProject=escape(dForm.elements['payProject'].value);
     var payContent=escape(dForm.elements['payContent'].value);
     var payNum=escape(dForm.elements['payNum'].value);
     var payCreator=escape(dForm.elements['payCreator'].value);
     var payState= escape(dForm.elements['payState'].value);
     var payRemark=escape(dForm.elements['payRemark'].value);
  //   var payMonth=escape(dForm.elements['payMonth'].value);   
     var timestamp = (new Date()).valueOf(); 
    var data=[payType,payDate,payPart,payProject,payContent,payNum,payCreator,payState,payRemark,timestamp];
    return data;
    }
    var to_json(p_data)
    {
        var json_object={
        		payType:p_data[0],
        		payDate:p_data[1],
        		payPart:p_data[2],
        		payProject:p_data[3],
        		payContent:p_data[4],
        		payNum:p_data[5],
        		payCreator:p_data[6],
        		payState:p_data[7],
        		payRemark:p_data[8],
        		timestamp:p_data[9]
        };
    }
	function add_rows(p_tb,p_form,p_head)
	{
		append_thead(p_tb,p_head);
		var tBody=document.getElementById(p_tb);
	    var data=get_data(p_form);
		var rows=document.getElementById(p_tb).getElementsByTagName("tr");
        var rowNum=rows.length;
		
		var row=tBody.insertRow(rowNum);

		for(var i=0;i<data.length;i++)
		{
			var theCell=row.insertCell(i);
				theCell.appendChild(document.createTextNode(data[i]));

		}
		
		
	}

	function create_xml(p_data)
	{
		
	}
	var p_tb="tb_detail";
	var p_form="form1";
</script>
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
<form id="form1" name="form1" method="post" action="addDetail.phpa?action=post" >
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
      <input name="realname" type="hidden" id="realname" value="<?php echo $_SESSION['realname']?>" />
    </label></td>
    </tr>
   <tr>
    <td colspan="4"><label>
      <input type="submit" name="submit" id="submit" onclick="add_rows(p_tb,p_form,p_head);" value="提交" />
      <input type="reset" name="reset" id="reset" value="重置" />
    </label></td>
    </tr> 
</table>
</form>
<div id="detail">
	<table id="tb_detail" border="1">
		<tbody></tbody>
	</table>
</div>
</div>

<?php 
}

?>
<button type="button" id="test" name="test" onclick="add_rows(p_tb,p_form,p_head);" >Create Element</button>


</body>
</html>