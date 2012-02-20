<?php
require_once(realpath(dirname(__FILE__)."./db.php"));
require_once(realpath(dirname(__FILE__)."./session.php"));

$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");


function display_department($ln_db)
{
	$sql="select id,department from department order by id;";
	$result=mysqli_query($ln_db,$sql);
	//print_r($result);
	$count=count($result);
	
//	//echo $count;
	while ($row=mysqli_fetch_array($result))
	{
		for($i=0;$i<$count;$i++)
		{
			//echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
		}
	}
	//link_close($ln_db);
}

function display_roles($ln_db,$flag)
{
	$sql="select id,Role,code from role order by id desc;";
//	//echo $sql;
	$result=mysqli_query($ln_db,$sql);
//	//print_r($result);
	$count=count($result);
	
	//echo $count;
	while ($row=mysqli_fetch_array($result))
	{
		for($i=0;$i<$count;$i++)
		{
			if($flag=='system')
			{
				//echo "<tr>";
				//echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td>";
				//echo "</tr>";
			}
			else{
				//echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
			}
		
		}
		}
//		link_close($ln_db);
}
function display_users($ln_db)
{
	$sql="select a.id,a.username,a.realname,b.department,c.Role from users a, department b,role c ";
	$sql=$sql."where a.role=c.id and a.department=b.id order by a.id;";
	$result=mysqli_query($ln_db,$sql);
	////print_r($result);
	$count=count($result);

	//	//echo $count;
	while ($row=mysqli_fetch_array($result))
	{
		//echo "<tr>";
		for($i=0;$i<$count;$i++)
		{
			
			//echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td>";
			
		}
		//echo "<tr/>";
	}
	//link_close($ln_db);
}
function link_close($ln_db)
{
	mysqli_close($ln_db);
}
//mysqli_close($dbc);

function connect_db()
{
	$dbc=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
	return $dbc;
}
function query_rows($dbc,$sql)
{
	$result=mysqli_query($dbc,$sql) or die("Function query rows Error!".mysqli_error($dbc)) ;
	return $result;
}
function report_row_to_col($dbc,$sql)
{
	$result=query_rows($dbc,$sql);
	$aCol=array();
	while($row=mysqli_fetch_array($result)){
		$aCol[]=$row[0];
		}
	
	
	$aCols=mysqli_fetch_fields($result);
/*	for($i=0;$i<count($aCols);$i++)
	{
		//echo $aCols[$i]->name;
	}
	*/
	return $aCol;

}


function report_get_rows($dbc,$aCol)
{
	////获取汇总开始
	$rep_sql="select * from (select lesson,month ";
	$t_col="";
	for ($i=0;$i<count($aCol);$i++)
	{
	$rep_sql=$rep_sql.",sum((case teacher when '".$aCol[$i]."' then fee else 0  end)) as '".$aCol[$i]."'";
	//$sql_month_sum=$sql_month_sum.",(case name when '".$aCol[$i]."' then num else 0  end) as '".$aCol[$i]."'";
	$t_col=$t_col.",sum((case teacher when '".$aCol[$i]."' then total else 0  end)) as '".$aCol[$i]."'";
	}
	$rep_sql=$rep_sql." from fee group by lesson,month) a order by a.month";
	$rep_res=mysqli_query($dbc,$rep_sql);
	////获取汇总结束
//	return $rep_res;
  	//echo "<br/>";
     //echo $rep_sql;
     //echo "<br/>";
	$sTotal=report_sum($dbc,$t_col);
   //获取表头及列名开始
	$aCols=mysqli_fetch_fields($rep_res);
	$table="<table border='1'>";
	$tb_foot="</table>";
	$table=$table."<tr>";
	for($i=0;$i<count($aCols);$i++)
	{
		$tb_head=$tb_head."<td>".$aCols[$i]->name."</td>";
	}
	//获取表头及列名结束
	$adata=array();
	//生成表
	$rownum=0;
	$rownums=mysqli_num_rows($rep_res);
	while($row=mysqli_fetch_array($rep_res))
	{  
		$data=array();
		$tr="<tr>";
		$td="";
		for($i=0;$i<count($row)/2;$i++)
		{
		 $td=$td."<td>".$row[$i]."</td>";	
		 $data[]=$row[$i];
		}
		$adata[]=$data;
		
		//判断是否增加按月汇总的金额
		$tr_row_total="";
		$td_row_total="";
		//echo "rownum:".$rownum."<br/>";
		//echo "rownums:".$rownums."<br/>";
		if($rownum>0)
		{
			if($adata[$rownum][1]!=$adata[$rownum-1][1])
			{
				//echo "第".$rownum."行与第".($rownum-1)."行不同<br/>";
				for($c=0;$c<count($sTotal);$c++)
				{
					//echo"汇总记录数：\$sTotal:".count($sTotal)."<br/>";
					if($adata[$rownum-1][1]==$sTotal[$c][0])
					{  

						$td_row_total="";
						for($cc=0;$cc<count($sTotal[$c]);$cc++)
						{
							$td_row_total=$td_row_total."<td>".$sTotal[$c][$cc]."</td>";
						}
						
					}
				}
				$tr_row_total="<tr bgcolor=\"#FF0000\"><td>汇总</td>".$td_row_total."</tr>";
				
				
			}
			elseif(($rownum+1)==$rownums)
			{
				//echo"最后一条记录：\$current rownum:".$rownum."\$adata总数：".count($adata)."<br/>";
				for($c=0;$c<count($sTotal);$c++)
				{
				
				if($adata[$rownum][1]==$sTotal[$c][0])
				{
				
				$td_row_total="";
					for($cc=0;$cc<count($sTotal[$c]);$cc++)
					{
					$td_row_total=$td_row_total."<td>".$sTotal[$c][$cc]."</td>";
					}
				
				}
				}
				
				$tr_row_total="<tr bgcolor=\"#FF0000\"><td>汇总</td>".$td_row_total."</tr>";
				
			}
		}	
		
		if(($rownum+1)==$rownums)
		{
			//echo "lastrow<br/>";
			$tbody=$tbody.$tr.$td."</tr>".$tr_row_total;
		}
		else
		{
		$tbody=$tbody.$tr_row_total.$tr.$td."</tr>";
		}
		$rownum++;
		
	}
	$table=$table.$tb_head."</tr>".$tbody.$tb_foot;
	//生成表
	
	//return $sTotal;
	//return $adata;
	return $table;
	//return $rep_sql;
	
}
//按月汇总
function report_sum($dbc,$rep_sql)
{
	$sql="select month ".$rep_sql."from (";
	$sql=$sql."select teacher,month,sum(fee) as total from  fee group by teacher,month".") b group by month";
	$result_total=mysqli_query($dbc,$sql);
	//echo "<br/>";
	//echo "<br/>";
	//echo "=============<br/>";
	//echo $sql;
	//echo "<br/>=================";
	//echo "<br/>";
	//echo "<br/>";
	$sTotal=array();
	$rowTotal=array();
	/* while($row=mysqli_fetch_array($result_total))
	{
		$rowTotal=array();
		$rowTotal[]=array($row["teacher"],$row["month"],$row["total"]);
		$sTotal[]=$rowTotal;
	} */
	
	while($row=mysqli_fetch_array($result_total))
	{
		$rowTotal=array();
		for($i=0;$i<count($row)/2;$i++)
		{
			$rowTotal[]=$row[$i];

	     }
	     $sTotal[]=$rowTotal;
		
	}
	//echo "\$sTotal:".count($sTotal);
	return $sTotal;
}

function test_sum($dbc)
{
	$sql="select teacher,month,sum(fee) as total from  fee group by teacher,month";
	$result_total=mysqli_query($dbc,$sql);
	
	while($row=mysqli_fetch_array($result_total))
	{
		//print_r($row);
		//echo "<br/>";
		$rowTotal=array();
		
		$rowTotal[]=array("teacher"=>$row["teacher"],month=>$row["month"],total=>$row["total"]);
		//print_r($rowTotal);
		//echo "<br/>";
		//echo "<br/>";
		$sTotal[]=$rowTotal;
	}
	//print_r($sTotal);
	return $sTotal;
}


function write_log($str){
	$fp=fopen("D:/phpproject/Star/config/log.txt","a+");
	fputs($fp,$str."\r\n");
	fclose($fp);
}

?>
