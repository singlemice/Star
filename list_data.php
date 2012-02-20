<?php
//echo $_SERVER['DOCUMENT_ROOT'];
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));

$aColumns = array( '序号',  '类型', '日期', '部门名称','项目','内容摘要','金额','造表人','状态','备注','编辑' );
$sIndexColumn = "ID";
$aDBColumns = array('ID','pay_type','pay_date','pay_part','pay_project','pay_content','pay_num','pay_creator','pay_state','pay_remarks');
$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");


/* Total data set length */
$sQuery = "
SELECT COUNT(`".$sIndexColumn."`)
FROM   pay_detail
";
$rResultTotal = mysqli_query($dbc, $sQuery ) or die(mysqli_error());
$aResultTotal = mysqli_fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];
$where=trim($_REQUEST['id']);

$sql="select ID,pay_type,DATE_FORMAT(pay_date,'%Y-%m-%d') as pay_date,pay_part,pay_project,pay_content,pay_num,pay_creator,pay_state,pay_remarks  from pay_detail";
if($where!="")
{
$sql=$sql." where id=".$where." order by id desc;";

}
elseif($_SESSION["code"]=="0010") {
$sql=$sql." where owner='".$_SESSION['realname']."' order by id desc;";
}
elseif(($_SESSION["code"]=="0000")or($_SESSION["code"]=="0100"))
{
	$sql=$sql." order by id desc;";
}

//$sql="select * from pay_detail order by id;";
$result=mysqli_query($dbc,$sql) or die("Error Select from  Mysql DB");




$iFilteredTotal=5;
/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = mysqli_fetch_array( $result ) )
	{
		$row = array();
		$count_col=count($aColumns)-1;
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			// echo $aDBColumns[$i];
				/* General output */
				//$row[] = '<a href="./editDetail.php?action=modify&id='.$aRow[ $aDBColumns[$i] ].">".$aRow[ $aDBColumns[$i] ]."</a>";
				if($i==$count_col)
				{
					$row[] = '<a href="./editDetail.php?action=modify&id='.$aRow[ $aDBColumns[0] ].'">'.Edit.'</a>';
				}
				else
				{
					$row[]=$aRow[ $aDBColumns[$i] ];
				//	echo $aRow[ $aDBColumns[$i] ]."<br/>";
				//	echo $aDBColumns[$i]."<br/>";
				}
			
		}
	//	echo "=========";
		$output['aaData'][] = $row;
	}
	mysqli_close($dbc);
	echo json_encode( $output );
	
?>