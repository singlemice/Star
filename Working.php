<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>DataTables example</title>
	<style type="text/css" title="currentStyle">
			@import " ./media/css/demo_page.css";
			@import " ./media/css/demo_table.css";
			@import " ./css/main.css";
		</style>
		<script type="text/javascript"  src="media/js/jquery.js"></script>
		<script type="text/javascript" src="media/js/jquery.dataTables.js"></script>
		</head>
		<?php 
		require_once(realpath(dirname(__FILE__)."./payDetail.php"));
		require_once(realpath(dirname(__FILE__)."./config/db.php"));
		require_once(realpath(dirname(__FILE__)."./config/session.php"));

		?>
		<body>
		<div class="menu_2">
<?php include './menu.php';?>
</div>

		<?php
		if(trim($_REQUEST['action'])=="addworking")
		{
			$date=trim($_POST['date']);
			$name=trim($_POST['name']);
			$Workload=trim($_POST['Workload']);
			$cost=trim($_POST['cost']);
			$Subsidy=trim($_POST['Subsidy']);
			$num=trim($_POST['num']);
			$payment=trim($_POST['payment']);
			$working=trim(addslashes($_POST['working']));
			$project=trim($_POST['project']);
			$remark=trim($_POST['remark']);
			$sql="insert into working (date,name,project,workload,cost,Subsidy,num,payment,working,remark)values (now(),'";
			$sql=$sql.$name."','".$project."',".$Workload.",".$cost.",".$Subsidy.",".$num.",'".$payment."','".$working."','".$remark."');";
			echo $sql;
			
		}
		elseif(trim($_REQUEST['action'])=="working")
		{
		?>
	<div class="container_edit">	
		<form name="workingForm" method="post" action="Working.php?action=addworking">
		  <p>日期：
		    <label>
		      <input type="text" name="date" id="date">
	        </label>
	      姓名：
	      <label>
	        <input type="text" name="name" id="name">
	        <br>
	      </label>
	        项目：
	        <label>
	        <input type="text" name="project" id="project">
	      </label>
	      </p>
		  <p>工作内容：
            <label>
              <textarea name="working" id="working" cols="45" rows="5"></textarea>
            </label>
          </p>
		  <p>工作量：
  <label>
    <input type="text" name="Workload" id="Workload">
  </label>
		    费用标准：
		    <label>
		      <input type="text" name="cost" id="cost">
	        </label>
	      </p>
		  <p>补贴：
		    <label>
		      <input type="text" name="Subsidy" id="Subsidy">
	        </label>
		  金额：
		  <label>
		    <input type="text" name="num" id="num">
		    <br>
          </label>
		  结帐方式：
		  <label>
		    <select name="payment" id="payment">
		      <option value="现金">现金</option>
		      <option value="银行转帐">银行转帐</option>
		      <option value="另用单">另用单</option>
	        </select>
		  </label>
		  </p>
		  <p>备注：
		    <label>
    <textarea name="remark" id="remark" cols="45" rows="5"></textarea>
  </label>
	      <label>
	        <input type="submit" name="submit" id="submit" value="提交">
	        </label>
	      <label>
	        <input type="reset" name="cancel" id="cancel" value="重置">
	        </label>
		  </p>
		  <p>&nbsp;</p>
        </form>
        </div>
        <?php 
		}
		elseif(trim($_REQUEST['action'])=="listworking")
		{
		?>
		<script type="text/javascript" charset="utf-8">
			/* Data set - can contain whatever information you want */
						
			$(document).ready(function() {
				//$('#dynamic').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>' );
				$('#example').dataTable( {
					"bProcessing": true,
					"sAjaxSource": "./list_working.php"			
				} );	
			} );
		</script>
			


		<div id="dynamic">
		<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0px" class="display" id="example">
		<thead>
		<tr>
		<th width="5%">序号</th>
		<th width="10%">日期</th>
		<th width="10%">项目</th>
		<th width="20%">工作内容</th>
		<th width="10%">姓名</th>		
		
		<th width="10%">工作量</th>
		<th width="10%">费用标准</th>
		<th width="5%">补贴</th>
		<th width="5%">金额</th>
		<th width="8%">结账方式</th>
		
		</tr>
		</thead>
		<tbody>
		<tr><td colspan="10" class="dataTables_empty">Loading data from server</td></tr>
		</tbody>
		<tfoot>
		<tr>
		<th width="5%">序号</th>
		<th width="10%">日期</th>
		<th width="10%">项目</th>
		<th width="20%">工作内容</th>
		<th width="10%">姓名</th>		
		
		<th width="10%">工作量</th>
		<th width="10%">费用标准</th>
		<th width="5%">补贴</th>
		<th width="5%">金额</th>
		<th width="8%">结账方式</th>
		</tr>
		</tfoot>
		</table>
		</div>
		


		<?php 
		}
		?>
</body>
		</html>