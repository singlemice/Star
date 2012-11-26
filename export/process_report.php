<?php 
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));

$start=$_REQUEST["start"];
$limit=$_REQUEST["limit"];
$aColumns = array( '序号', '日期', '项目','费用类型','工作内容', '姓名', '工作量','费用标准','补贴','金额','结账方式','备注','owner','timeflag','打印','经手人' );
$sIndexColumn = "ID";
$aDBColumns = array('ID','date','project','fee_type','working','name','workload','cost','Subsidy','manual_num','num','payment','remark','owner','timeflag','billno','is_print','payCreator');
$dbc=mysqli_connect("$db_host",$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");

?>