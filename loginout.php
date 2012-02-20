<?php
require_once(realpath(dirname(__FILE__)."/config/session.php"));
unset($_SESSION["login_status"]);
unset($_SESSION["username"]);
echo "<script>window.location =\"index.php\";</script>";
?>
