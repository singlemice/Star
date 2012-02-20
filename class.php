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
		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
</head>
<body>
<?php
require_once(realpath(dirname(__FILE__)."./config/db.php"));
require_once(realpath(dirname(__FILE__)."./config/session.php"));
?>
		<div class="menu_2">
<?php include './menu.php';?>
</div>
<?php 
if(trim($_REQUEST['action']=='addfee'))
{
	$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
	$month=trim($_POST['feeMonth']);
	$lesson=trim($_POST['lesson']);
	
	foreach($_POST['teacher'] as $item)
	{
		$sql="insert into fee(lesson,month,teacher,fee)values('".$lesson."','".$month."','";
		$sql=$sql.trim($item)."',".trim($_POST['fee_'.trim($item)]).");";
		echo $sql."<br/>";
		$result=mysqli_query($dbc,$sql)  or die("Error inserting into Mysql DB");
	}
	mysqli_close($dbc);
}

elseif(trim($_REQUEST['action']=='postclass'))
		{
			$sql="insert into class (lesson_name,month) values('".trim($_POST['className'])."','".trim($_POST['classMonth'])."');";
			echo $sql;
		
			$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
			
			$result=mysqli_query($dbc,$sql)  or die("Error inserting into Mysql DB");
			mysqli_close($dbc);
		}
		elseif(trim($_REQUEST['action']=='addclass'))	
		{	
?>
<div class="container_edit">	
<form id="form1" name="form1" method="post" action="class.php?action=postclass" >
  
    <input type="text" name="className" id="className" /> 
    <select name="classMonth" size="1" id="classMonth">
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
      <input type="submit" name="submit" id="submit" value="新增" />
    
 
</form>
</div>
<?php

	}
elseif(trim($_REQUEST['action']=='listclass'))
{
	$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
	$sql="select * from teacher order by id;";
	$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");
	$sql2="select * from class order by id desc";
	$result2=mysqli_query($dbc,$sql2) or die("Error Select lesson from  Mysql DB");
?>
<div class="container_edit">
<form id="form2" name="form2" method="post" action="class.php?action=addfee">
课程：<select name="lesson" size="1" id="lesson">
 <?php 
 
 while($row2=mysqli_fetch_array($result2)){
 ?>

        <option value="<?php echo trim($row2['lesson']);?>"><?php echo trim($row2['lesson']);?></option>

<?php 
 }
?>
</select>
月份：<select name="feeMonth" size="1" id="feeMonth">
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
  <p>
    <?php 
    while($row=mysqli_fetch_array($result)){
    	
    ?>
    <label>
      <input type="checkbox" name="teacher[]" value="<?php echo $row['teacher'];?>" id="teacher_<?php echo $row['ID'];?>" />
       
      </label><?php echo $row['teacher'];?> &nbsp;  &nbsp;&nbsp;金额：<input type="text" name="fee_<?php echo trim($row['teacher']);?>" id="className" />
     
    <?php 
    $i++;
    if (fmod($i,2)==0) {echo "<br/>";}
    }
    ?>
  </p>
  <input type="submit" name="submit" id="submit" value="新增" />
</form>
</div>
<?php 
mysqli_close($dbc);
}
?>
</body>
</html>