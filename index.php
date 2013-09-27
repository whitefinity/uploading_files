<?php 
include("global.inc.php");
ob_start();
$pageName="Uload Files";
if(isset($_POST['submit'])){
	$user=trim($_POST['username']);
	$pass=trim($_POST['pass']);
	$userAndPass=array($user,$pass);

	//validation funcitons for username and password 	
	if($user=="user" && $pass=="qwerty"){
	$_SESSION['isLogged']=$user;	
	}elseif($user=="user2" && $pass=="qwerty2"){
	$_SESSION['isLogged']=$user;
	}else{
		$_SESSION['isLogged']=FALSE;	
		echo "<p class=\"forgot-password\">Wrong username/password!</p>";
	}
}else{
	echo "<p class=\"forgot-password\">Please log in!</p>";
}
if(isset($_SESSION['isLogged'])&&($_SESSION['isLogged']==true)){
	$_SESSION['message']="Welcome!";
	header('Location: files.php');
	exit;
}
ob_flush();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body>
		<p class="forgot-password"></p>
		<form method="post" name="enter" class="login">
			<p>
      <label for="login">Username:</label>
		<input type="text" name="username" id="login" />
		</p>
		 <p>
      <label for="password">Password:</label>
	<input type="password" name="pass" id="password" /><br />
	</p>
	 <p class="login-submit">
			<button type="submit" name="submit" class="login-button" >Login</button>
			</p>
		</form>		   
	</body>
</html>