<title>Show All</title>
<font face="calibri">
<body bgcolor="#F7F8E0">
<h2>User Information</h2>
<?php
  $con=mysql_connect("localhost","root","usbw");        //<-- Connect to server
  mysql_select_db("lms",$con);				//<-- select database ict
  $sql=mysql_query("select * from lms.users");		//<-- Enter the sql syntax inside mysql_query()
  while($data=mysql_fetch_array($sql)){			//<-- put the data into array using mysql_fetch_array()
    echo "Name: ".$data["Name"]."<br>";			//<-- Call the admin_no
    echo "Phone: ".$data["Tel_no"]."<br>";	//<-- Call the name
	echo "ID: ".$data["ID"]."<br>";
	echo "Address: ".$data["Address"]."<br><br>";
  }	
?>
<h2>Book Information</h2>
<?php
	$sql=mysql_query("select * from lms.books");		//<-- Enter the sql syntax inside mysql_query()
  while($data=mysql_fetch_array($sql)){			//<-- put the data into array using mysql_fetch_array()
    echo "ISBN: ".$data["ISBN"]."<br>";			//<-- Call the admin_no
    echo "bkname: ".$data["bkname"]."<br><br>";	//<-- Call the name
  }
?>
<h2>Transactions</h2>
<?php
	$sql=mysql_query("select * from lms.transactions");		//<-- Enter the sql syntax inside mysql_query()
  while($data=mysql_fetch_array($sql)){			//<-- put the data into array using mysql_fetch_array()
    echo "User ID: ".$data["User_ID"]."<br>";			//<-- Call the admin_no
    echo "ISBN: ".$data["ISBN"]."<br>";	//<-- Call the name
	echo "Borrow Date: ".$data["Borrow_Date"]."<br>";
	echo "Return Date: ".$data["Return_Date"]."<br><br>";
  }
  mysql_close($con);					//<-- Close the connect to server
?>
</font>