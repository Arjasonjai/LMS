<!DOCTYPE html>
<html>
<head>
<body bgcolor="#F7F8E0">
<title>Insert Username</title>
</head>
<body>
<font face="calibri">

<?php
include 'Delete book.php';
if (isset($_POST['submit_3'])) {
	include_once 'dbh.inc.php';
	$ISBN = mysqli_real_escape_string($conn, $_POST['ISBN_DEL']);
	//check for empty fields...
	if (empty($ISBN)) {
		// header("Insert Username.php");
		echo "<br><font color='red'>Please fill in the ISBN!</font>";
		exit();
	} else {
			// Check if user ID is available...
				$sql = "SELECT * FROM books WHERE ISBN='$ISBN'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if ($resultCheck > 0) {
			$sql = "DELETE FROM `books` WHERE ISBN='$ISBN'";
		$result = mysqli_query($conn, $sql);
		} else {
			$sql = "SELECT * FROM books WHERE ISBN='$ISBN'";
		$result_1 = mysqli_query($conn, $sql);
		$resultCheck_1 = mysqli_num_rows($result_1);
		
		if ($resultCheck_1 < 0) {
			echo "<br><font color='red'>Book Does NOT exist!</font>";
			exit();
		} // else {
		// $sql = "INSERT INTO books (ISBN,bkname) VALUES ('$ISBN', '$bkname');";
		// $result = mysqli_query($conn, $sql);
		// header("Insert Username?Insert Username=Success");
		// }
		// }
	}
}
} // else {
	header("Insert Username.php");
	exit();
/* useful comment
	include 'Insert Username.php';
if (isset($_POST['submit_1'])) {
	include_once 'dbh.inc.php';
	
	$I_username = mysqli_real_escape_string($conn, $_POST['I_username']);
	$Tel_no = mysqli_real_escape_string($conn, $_POST['Tel_no']);
	$ID_User = mysqli_real_escape_string($conn, $_POST['ID_User']);
	$Address = mysqli_real_escape_string($conn, $_POST['Address']);
	
	//check for empty fields
	if (empty($I_username) || empty($Tel_no) || empty($ID_User) || empty($Address)) {
		// header("Insert Username.php");
		echo "<font color='red'>Please fill in all the information!</font>";
	} else {
		$sql = "INSERT INTO user (Name,Tel_no,ID,Address) VALUES ('$I_username', '$Tel_no', '$ID_User', '$Address');";
		$result = mysqli_query($conn, $sql);
		header("Insert Username?Insert Username=Success");
	}
} else {
	header("Insert Username.php");
	exit();
}
*/

/* commeted out
$con=mysql_connect("localhost","root","usbw");        
mysql_select_db("lms",$con);
$sql=mysql_query("select * from lms.user ");

if (!empty($_POST['submitted']) && $_POST['submitted']=="true") {
	if (empty($_POST['I_username'])) {
	echo "<font color='red'>*Username is required!</font><br />";
}else{
	$I_username = $_POST['I_username'];
	
}	

	if (empty($_POST['Tel_no'])) {
	echo "<font color='red'>*Telephone Number is required!</font><br />";
}else{
	$Tel_no = $_POST['Tel_no'];
}	

	if (empty($_POST['ID_User'])) {
	echo "<font color='red'>*User ID is required!</font><br />";
}else{
	$ID_User = $_POST['ID_User'];
}	

	if (empty($_POST['Address'])) {
	echo "<font color='red'>*Address is required!</font>";
}else{
	$Address = $_POST['Address'];
}	


}

header ("Insert Username.php");
*/
?>

</font>
</body>
</body>
</html>