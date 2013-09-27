<?php 
session_start();
function dbg($var){
	print "<pre>"; 
	print_r($var);	
	print "</pre>"; 
}
if(!isset($_SESSION['time'])){
	$_SESSION['time']=time();
}else{
$diff=abs(time()-$_SESSION['time']);
	if($diff>600){
		header("Location: logout.php");
		exit;
	}else{
		$_SESSION['time']=time();
	}
}
?>