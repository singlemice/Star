<?php 
date_default_timezone_set ("Asia/Shanghai");
//echo strtotime("2012-1-7");
$date = date( 'Y-m','2012-1-7');
echo $date;
if ($_REQUEST['action']=='add')
{
	$str='<a href=editDetail.php?action=modify&id=3></a>';
echo	json_encode($str);
}

?>


<form id="form2" name="form2" method="post" action="test.php?action=add">
  <label>
    <input type="text" name="test" id="test" />
  </label>
  <label>
    <input type="submit" name="submit2" id="submit2" value="提交" />
  </label>
</form>
<p>&nbsp;</p>
