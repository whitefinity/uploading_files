<?php
include("global.inc.php");
$p=pathinfo($_REQUEST['f']);
$name=$p['basename'];
$dir=$_SESSION['isLogged']."/".$name;
if(!file_exists($dir)){
	die("file not found!");
}
header("Content-Type: application/octet-stream");
header('Content-disposition: inline; filename="'.$name.'"');
print file_get_contents($dir);
?>