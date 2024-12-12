<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: project_login.php");
exit();
?>
