<?php
$data='{"detail":[
{
			ID : 1,
			date : "May 24, 2009",
			project:"招生"
}
]}';
	//echo json_encode( $data );
	

$v1=array('ID'=>1,'date'=> 'May 24, 2009','project'=>'招生');
$v2=array('ID'=>2,'date'=> 'May 24, 2009','project'=>'招生');
$v3=array('ID'=>3,date=> 'May 24, 2009','project'=>'招生');
$v4=array('ID'=>4,'date'=> 'May 24, 2009','project'=>'招生');
$data=array('detail'=>array($v1,$v2,$v3,$v4));
echo json_encode($data);
?>