<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import " ./media/css/demo_page.css";
			@import " ./media/css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<?php 
		$action=trim($_REQUEST['action']);
		if($action=='detail')
		{?>
		<script type="text/javascript" charset="utf-8">
			/* Data set - can contain whatever information you want */
						
			$(document).ready(function() {
				//$('#dynamic').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>' );
				$('#example').dataTable( {
					"bProcessing": true,
					"sAjaxSource": "importexcel.php?action=detail"			
				} );	
			} );
		</script>
		<?php 
		}
		elseif($action=='workingtime')
		{
		?>
		<script type="text/javascript" charset="utf-8">
			/* Data set - can contain whatever information you want */
						
			$(document).ready(function() {
				//$('#dynamic').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>' );
				$('#example').dataTable( {
					"bProcessing": true,
					"sAjaxSource": "./importexcel.php?action=workingtime"			
				} );	
			} );
		</script>
		<?php 
		}
		?>
	</head>
	<body>
	<?php include './menu.php';?>
	<form  id="form1" name="form1" method="post"  action="importexcel.php?action=<?php echo $action?>&type=insert">
	<div id="container">
	<?php 
	if($action=='detail')
	{
	?>
	<div id="dynamic">
	<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0px" class="display" id="example">
	<thead>
  <tr charoff="">
    <th width="5%" align="center" valign="middle">序号</th>
    <th width="5%" align="center" valign="middle">类型</th>
    <th width="10%" align="center" valign="middle">日期</th>
    <th width="10%" align="center" valign="middle">部门名称</th>
    <th width="10%" align="center" valign="middle">项目</th>
    <th width="15%" align="center" valign="middle">内容摘要</th>
    <th width="10%" align="center" valign="middle">金额</th>
    <th width="8%" align="center" valign="middle">造表人</th>
    <th width="5%" align="center" valign="middle">状态</th>
    <th width="8%" align="center" valign="middle">备注</th>
  </tr>
  </thead>
  <tbody>
  <tr>
			<td colspan="13" class="dataTables_empty">Loading data from server</td>
		</tr>
  </tbody>
  <tfoot>
  <tr>
    <th width="5%" align="center" valign="middle">序号</th>
    <th width="5%" align="center" valign="middle">类型</th>
    <th width="10%" align="center" valign="middle">日期</th>
    <th width="10%" align="center" valign="middle">部门名称</th>
    <th width="10%" align="center" valign="middle">项目</th>
    <th width="15%" align="center" valign="middle">内容摘要</th>
    <th width="10%" align="center" valign="middle">金额</th>
    <th width="8%" align="center" valign="middle">造表人</th>
    <th width="5%" align="center" valign="middle">状态</th>
    <th width="8%" align="center" valign="middle">备注</th>
  </tr>
  </tfoot>
</table>
</div>
<?php 
	}
	elseif($action=='workingtime')
	{
?>
<div id="dynamic">
	<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0px" class="display" id="example">
	<thead>
  <tr charoff="">
		<th width="7%">日期</th>
		<th width="23%">工作内容</th>
		<th width="15%">项目</th>
		<th width="5%">姓名</th>
		<th width="10%">工作量</th>
		<th width="10%">费用标准</th>
		<th width="5%">补贴</th>
		<th width="5%">金额</th>
		<th width="8%">结账方式</th>
		<th width="10%">备注</th>
  </tr>
  </thead>
  <tbody>
  <tr>
			<td colspan="13" class="dataTables_empty">Loading data from server</td>
		</tr>
  </tbody>
  <tfoot>
  <tr>
		<th width="7%">日期</th>
		<th width="23%">工作内容</th>
		<th width="15%">项目</th>
		<th width="10%">姓名</th>
		<th width="10%">工作量</th>
		<th width="10%">费用标准</th>
		<th width="5%">补贴</th>
		<th width="5%">金额</th>
		<th width="8%">结账方式</th>
		<th width="10%">备注</th>
  </tr>
  </tfoot>
</table>
</div>
<?php 
	}
?>
</div>

 <input type="submit" name="submit" id="submit" value="提交" />
</form>
	</body>
	
	</html>