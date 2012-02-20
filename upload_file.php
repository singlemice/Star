
<?php
require_once(realpath(dirname(__FILE__)."/config/db.php"));
require_once(realpath(dirname(__FILE__)."/config/session.php"));
echo $_FILES["file"]["type"];
echo $_FILES["file"]["size"];
$action=trim($_REQUEST['action']);

if ((trim($_FILES["file"]["type"]) == "application/vnd.ms-excel")
		&& ($_FILES["file"]["size"] < 100000))
{
if ($_FILES["file"]["error"] > 0)
{
	echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
else
{
	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	echo "Type: " . $_FILES["file"]["type"] . "<br />";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	echo "Tmp file in: " . $_FILES["file"]["tmp_name"];
	echo $date."<br/>";
	echo $date."<br/>";
	echo $date."<br/>";
	$date = date(YmdHis);
	echo $date."<br/>";
	echo $date."<br/>";
	echo $date."<br/>";
	$new_name=$date."_".$_FILES["file"]["name"];
if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
     // move_uploaded_file($_FILES["file"]["tmp_name"],"data/" . $_FILES["file"]["name"]);
      	move_uploaded_file($_FILES["file"]["tmp_name"],"data/" .$new_name);
      	$_SESSION['filepath']="data/" .$new_name;
      echo "Stored in:session " . $_SESSION['filepath'];
      echo "<script>window.location =\"excelpreview.php?action=".$action."\";</script>";
      }
}
}
else
{
	if ($_FILES["file"]["size"]>=100000)
	{
	echo "文件超过100k!";
	}
	else
	{
		echo "Error : File type error!";
	}
}
?>