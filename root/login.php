<?php
include 'init.php';

if (empty ($_POST) === FALSE) {
	$Name = $_POST['Name'];
	echo "$Name";
}
?>