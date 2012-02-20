<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑数据</title>
<script type="text/javascript"  src="media/js/jquery.js"></script>
</head>

<body>
<?php 
require_once(realpath(dirname(__FILE__)."./payDetail.php"));
require_once(realpath(dirname(__FILE__)."./config/db.php"));
require_once(realpath(dirname(__FILE__)."./config/session.php"));
?>
<div class="menu_2">
<?php 
include './menu.php';
?>
</div>
<?php 
if ($_REQUEST['action']=='addteachers')
{
	?>
	<div class="container_edit">
    批量添加教师信息
    注：每行一行记录，如：<br/>
张老师<br/>
李老师<br/>
王老师<br/>
	<form id="teacher" name="teacher" method="post" action="./dataimport.php?action=postteachers">
	  <label>
	    <textarea name="teachers" id="teachers" cols="45" rows="10"></textarea>
	    <input type="submit" name="submit" id="submit" value="提交" />
	  </label>
</form>
</div>
<?php 
}
elseif ($_REQUEST['action']=='addcourses')
{
?>
<div class="container_edit">
批量添加监考考课程<br/>
注：每行一行记录，第一行为月份，第二列为监考课程如：<br/>
月份须使用 一月、二月类似。<br/>

一月;4.9期货<br/>
二月;4.23人事干部开班<br/>
三月;4.24华夏银行<br/>
四月;4.25课酬<br/>
四月;4.25阳光财险<br/>


<form id="course" name="course" method="post" action="./dataimport.php?action=postcourses">
	  <label>
	    <textarea name="courses" id="courses" cols="45" rows="10"></textarea>
	    <input type="submit" name="submit" id="submit" value="提交" />
	  </label>
</form>
</div>
<?php 
}
elseif($_REQUEST['action']=='postteachers')
{
	$values   =   explode(chr(13),$_POST['teachers']);
	$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
	$sql="insert into teacher(teacher) values('";
	
	$total_teacher=count($values);
	for ($i=0;$i<$total_teacher;$i++)
	{
		if(strlen(trim($values[$i]))!=0)
		{
			$sql1=$sql.addslashes(trim($values[$i]))."');";
			mysqli_query($dbc,$sql1);
		}
	}
	mysqli_close($dbc);
	
}
elseif($_REQUEST['action']=='postcourses')
{
	$courses   =   explode(chr(13),$_POST['courses']);
	$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
	$sql="insert into course(month,course) values('";
	print_r($courses);
	$total_courses=count($courses);
	echo $total_courses;
	echo "<br/>";
	for($i=0;$i<$total_courses;$i++)
	{
		$course=explode(';', $courses[$i]);
		if(count($course)==2)
		{
		echo "<br/>";
		$sql1=$sql.addslashes(trim($course[0]))."','".addslashes(trim($course[1]))."');";
		$result=mysqli_query($dbc,$sql1) or die(mysqli_error($dbc));
		}
	}
	mysqli_close($dbc);

}
?>