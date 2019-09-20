<!DOCTYPE html>
<html>
<head>
<body bgcolor="#F7F8E0">
<font face="Comic Sans MS">
<center><title>Book Information</title></center>
</head>
<body>
<center><h1>Book Information</h1></center>
<!--*0=Returned<br>
 &nbsp;&nbsp;1=Borrowed<br><br>-->

<?php
  $con=mysql_connect("localhost","root","usbw");        //<-- Connect to server
  mysql_select_db("lms",$con);				//<-- select database ict
  $sql=mysql_query("select * from lms.books");		//<-- Enter the sql syntax inside mysql_query()
  while($data=mysql_fetch_array($sql)){			//<-- put the data into array using mysql_fetch_array()
    echo "ISBN: ".$data["ISBN"]."<br>";			//<-- Call the admin_no
    echo "Book Name: ".$data["bkname"]."<br><br>";	//<-- Call the name
	// echo "Status: ".$data["Return"]."<br><br>";
  }	
?>

</font face>
</body>
</html>