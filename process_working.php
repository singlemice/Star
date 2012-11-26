<?php
		
		require_once (realpath ( dirname ( __FILE__ ) . "./config/db.php" ));
		require_once (realpath ( dirname ( __FILE__ ) . "./config/session.php" ));
		
		if (trim ( $_POST ['action'] ) == "addworking") {//添加工时
			$date = trim ( $_POST ['date'] );
			$name = trim ( $_POST ['name'] );
			$fee_type = trim ( $_POST ['fee_type'] );
			$Workload = trim ( $_POST ['Workload'] );
			$cost = trim ( $_POST ['cost'] );
			$Subsidy = trim ( $_POST ['Subsidy'] );
			$manual_num=trim ( $_POST ['manual_num'] );
			$num = $cost*$Workload +$Subsidy+$manual_num;
			$payment = trim ( $_POST ['payment'] );
			$working = trim ( addslashes ( $_POST ['working'] ) );
			$project = trim ( $_POST ['project'] );
			$remark = trim ( $_POST ['remark'] );
			$timeflag = trim ( $_POST ['timeflag'] );
			$owner = trim ( $_POST ['owner'] );
			$payCreator = trim ( $_POST ['payCreator'] );
			$userflag = explode ( ",", $owner );
			$owner = $userflag [0];
		
			$sql = "insert into working (date,name,project,fee_type,workload,cost,Subsidy,manual_num,num,payment,working,remark,timeflag,owner,payCreator,billno)values (now(),'";
			$sql = $sql . $name . "','" . $project . "','".$fee_type."'," . $Workload . "," . $cost . "," . $Subsidy . "," .$manual_num.",". $num . ",'" . $payment . "','" . $working . "','" . $remark . "','" . $timeflag . "'," . $owner . ",'" . $payCreator . "',null );";
		
			$dbc = mysqli_connect ( $db_host, $db_user, $db_pwd, $db_name ) or die ( "Error connection to Mysql Server" );
			
			$result = mysqli_query ( $dbc, $sql ); // or die("Error inserting into Mysql
			                                  // DB");
			
			mysqli_close ( $dbc );
			
			$data = array ("success" => true, "msg" => "OK" );
			echo json_encode ( $data );
		
		} elseif (trim ( $_POST ['action'] ) == "gen_form") {//生成表单
			$ids = trim ( $_POST ['ids'] );
			$ids = explode ( ",", $ids );
			$where = ' where id in (' . join ( ',', $ids ) . ')';
			
			$owner = trim ( $_POST ['id'] );
			
			$userflag = explode ( ",", $owner );
			$owner = $userflag [0];
			$sql = "select max(billno) as billno  from working where owner=" . $owner;
			
			$dbc = mysqli_connect ( $db_host, $db_user, $db_pwd, $db_name ) or die ( "Error connection to Mysql Server" );
			
			$result = mysqli_query ( $dbc, $sql ); // or die("Error inserting into Mysql
			                                  // DB");
			$flag = mysqli_num_rows ( $result );
			
			if ($flag > 0) {
				$aResultTotal = mysqli_fetch_array ( $result );
				
				$oldbill = $aResultTotal ['billno'];
				
				$num = substr ( $oldbill, strlen ( $oldbill ) - 2, 2 ) + 1;
				
				if ($num < 10) {
					$billno = '0' . $num;
				} else {
					$billno = $num;
				}
				$last_month = substr ( $oldbill, 0, 6 );
				
				$cur_month = date ( Ym, time () );
				
				if ($last_month != $cur_month) {
					$billno = '01';
				}
			} else {
				$billno = '01';
			}
			
			if (strlen ( $owner ) < 3) {
				$len = 3 - strlen ( v );
				for($i = 0; $i < $len; $i ++) {
					$owner = '0' . $owner;
				}
			}
			
			$new_billno = date ( Ymd, time () ) . $owner . $billno;
			$upsql = 'update working set billno="' . $new_billno . '"' . $where;
			
			$result = mysqli_query ( $dbc, $upsql );
			mysqli_close ( $dbc );
			$data = array ("success" => true, "msg" => "OK" );
			echo json_encode ( $data );
		}elseif (trim ( $_POST ['action'] ) == "makeinvalid") {//记录作废
		
		$ids = trim ( $_POST ['ids'] );
			$ids = explode ( ",", $ids );
			$where = ' where id in (' . join ( ',', $ids ) . ')';
			
			$owner = trim ( $_POST ['id'] );
			
			$userflag = explode ( ",", $owner );
			$owner = $userflag [0];
			
			$upsql = 'update working set invalid= 1'. $where."  and owner=".$owner;
			echo $upsql;
			$dbc = mysqli_connect ( $db_host, $db_user, $db_pwd, $db_name ) or die ( "Error connection to Mysql Server" );
		$result = mysqli_query ( $dbc, $upsql );
			mysqli_close ( $dbc );
			$data = array ("success" => true, "msg" => "OK" );
			echo json_encode ( $data );
		
		
		}
		?>