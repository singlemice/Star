<?php
require_once(realpath(dirname(__FILE__)."./config/db.php"));
class star_db {
   public function connect()
   {
   return mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die("Error connection to Mysql Server");
   }
}

?>