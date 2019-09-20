<!DOCTYPE html>
<html>
<head>
<title>Borrowed index</title>
 </head>
<body>
<body bgcolor="#F7F8E0">
</body>
<font face="calibri">
	<?php
	include 'borrow.php';
	include_once 'dbh.inc.php';
$User_ID = $_POST['User_ID'];
$ISBN = $_POST['ISBN'];
$borrow=False;
date_default_timezone_set('Asia/Hong_Kong');
$date=date("Ymd");
$con=mysql_connect("localhost","root","usbw");        
mysql_select_db("lms",$con);
    $sql=mysql_query("select * from lms.transactions ");
    while($data=mysql_fetch_array($sql)){
		if($_POST['ISBN']==$data['ISBN'] and $data['Return']==0){
			$borrow=True;
			echo'<center>This book has been borrowed</center><br>';
		}	
  }
  
if (!empty($_POST["ISBN"]) and !empty($_POST["User_ID"]) and $borrow==false){
	
	$sql = "SELECT * FROM books WHERE ISBN='$ISBN'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	$sql_1 = "SELECT * FROM users WHERE ID='$User_ID'";
	$result_1 = mysqli_query($conn, $sql_1);
	$resultCheck_1 = mysqli_num_rows($result_1);
	
	if ($resultCheck < 1 and $resultCheck_1 < 1) {
		echo "Both User and ISBN doesn't exist!";
	}else if ($resultCheck < 1 ) {
		echo "<br><font color='red'>ISBN doesn't exist!</font>";
	} else if ($resultCheck_1 < 1) {
		echo "User doesn't exist";
	} else {
		$sql=mysql_query("INSERT INTO lms.transactions (User_ID,ISBN,Borrow_Date,Return_Date) VALUES ('$_POST[User_ID]','$_POST[ISBN]', '$date', 'N/A')");
		mysql_query("UPDATE lms.books SET `Return`= 0 WHERE ISBN='$_POST[ISBN]'");
	 $d=strtotime("+7 days");
	$borrow=True;
	 echo "<center>Borrowed Successfully!</center>";
	echo "<center>Please return this book before/on ".date("Y/m/d",$d)."</center><br><br>";
	}
} // else {
	// header("borrow.php");
	// echo "<br><font color='red'>An error occured</font>";
	// exit();
// }



/* commented out
if ($borrow==true){
    $d=strtotime("+7 days");
}

if($User_ID){
	$UserID = mysql_query("SELECT Name FROM user WHERE name='$User_ID' ");
	$count = mysql_num_rows($UserID);
	
	if ($count!=0){
		
		die("User doesn't exist!");
	}
}


			
			 if(mysql_num_rows($query_1) > 0) {
			  mysql_query("UPDATE `transaction` SET `ISBN`=[$ISBN] WHERE ISBN='$ISBN'");
		  }else{
			  include 'borrow.php'; 
			  die("<font color='red'> **Error: Book doesn't exist!");
		  }
		   
		  if(mysql_num_rows($query_1) > 0) {
			  mysql_query("UPDATE `transaction` SET `ISBN`=[$ISBN] WHERE ISBN='$ISBN'");
		  }else{
			  include 'borrow.php'; 
			  die("<font color='red'> **Error: Book doesn't exist!");
		  }
		   $count = mysql_num_rows($User_ID);
		  
		  if($count!=0){ 
		  $sql=mysql_query("INSERT INTO lms.transaction (User_ID, ISBN, Borrow_Date) VALUES ('$User_ID','$ISBN','$date')")		//<-- Enter the sql syntax inside mysql_query()
		  }
		  else{
			  include 'borrow.php'; 
			  die("<font color='red'> **Error: User doesn't exist!");
		  }
		  
		  header("Location: /borrow.php");
		  */
		  mysql_close($con);					//<-- Close the connect to server
		  
	?>
</font>