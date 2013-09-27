<?php
include("global.inc.php");

$pageName="files";
if(isset($_SESSION['isLogged'])){
$folder=$_SESSION['isLogged'];	
?>
<!DOCTYPE html>
<head><link href="css/style.css" rel="stylesheet" /></head>
<html>
<body>
	<div class="main"></div>
	<section class="container">
	 <nav>
      <ul class="nav">
<li class="files"><a href="uploading.php" >Upload file  &raquo;</a></li>
<li class="logout"><a href="logout.php">Logout</a></li>
</ul>
</nav>
</section>
</body>
</html>
<?php
function HumanReadableFilesize($size) {
    $mod = 1024;
    $units = explode(' ','B KB MB GB TB PB');
    for ($i = 0; $size > $mod; $i++) {
        $size /= $mod;
    }
    return round($size, 2) . ' ' . $units[$i];
}
// open this directory 
$myDirectory = opendir($folder);
// get each entry
while($entryName = readdir($myDirectory)) {
	$dirArray[] = $entryName;
}
// close directory
closedir($myDirectory);
//	count elements in array
$indexCount	= count($dirArray);
// sort 'em
sort($dirArray);
// print 'em
print("<div class=table><table>\n");
print("<tr><th>Filename</th><th>Filetype</th><th>Filesize</th></tr>\n");
// loop through the array of files and print them all
for($index=0; $index < $indexCount; $index++) {
        if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
		print("<tr><td><a href=\"getfile.php?f=$dirArray[$index]\">$dirArray[$index]</a></td>");
		print("<td>");
		print(filetype("./".$folder."/".$dirArray[$index]));
		print("</td>");
		print("<td>");
		print HumanReadableFilesize(filesize("./".$folder."/".$dirArray[$index]));
		print("</td>");
		print("</tr>\n");
	}
}
print("</table></div>\n");
}else{
	header("Location: index.php");
	exit;
}
?>

