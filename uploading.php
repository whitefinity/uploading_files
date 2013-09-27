<?php
include("global.inc.php"); 
$pageName="Upload";
$allowedFiles=array('jpg','jpeg','png');
if(isset($_SESSION['isLogged'])){	
$folder=($_SESSION['isLogged']);
if(isset($_POST['submit'])){
	$file=$_FILES['file'];
	$p=pathinfo($file['name']);
	if(!in_array(strtolower($p['extension']), $allowedFiles)){
		echo "<span class=\"forbide\">Forbidden file!</span>";
	}else{
	if(count($_FILES)>0){
		move_uploaded_file($_FILES['file']['tmp_name'],$folder.DIRECTORY_SEPARATOR.$_FILES['file']['name']);
		echo "<span class=\"OK\">File uploaded successfully!</span>";
	}else{
		echo "<span class=\"forbide\">Unsuccessful upload!</span>";
	}}
}	
?>
<!DOCTYPE html>
<head><link <?php if($pageName!="Upload"){ echo "href=\"css/style.css\"";}else{echo "href=\"css/style2.css\"";};?> rel="stylesheet" /></head>
<html>
<body>
	<div class="main"></div>
	<section class="container">
	 <nav>
     <ul class="nav">
     	
		<li class="logout"><a href="logout.php">Logout</a></li>
		<li class="files">&laquo;  <a href="files.php">files</a></li>
	</ul>
	</nav>
		<form method="post" enctype="multipart/form-data" name="enter">			
			<input type="file" name="file" class="button1" value="upload"><br />
			<button type="submit" name="submit" class="login-button" >Login</button>
		</form>
	</body>
</html>
<?php }else{
header('Location: index.php');
exit;
}?>