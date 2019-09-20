<!DOCTYPE html>
<html>
<head>
<body bgcolor="#F7F8E0">
<font face="Comic Sans MS">
<center><title>Show All</title></center>
</head>
	
	<body>
		<center><h1>Transactions</h1></center>
		<?php
		  $con=mysql_connect("localhost","root","usbw");        //<-- Connect to server
		  mysql_select_db("lms",$con);				//<-- select database ict
		  $sql=mysql_query("select * from lms.transactions");		//<-- Enter the sql syntax inside mysql_query()
		  $Return=False;
	
/*		 
		  function strbool($Status)
{
    return $Status ? 'true' : 'false';
}
*/
		  while($data=mysql_fetch_array($sql)){			//<-- put the data into array using mysql_fetch_array()
		/*	  	  if (["Return"]==false){
			  $Return=False;
		  }else{
			  $Return=True;
		  }
		  */
			echo "User ID: ".$data["User_ID"]."<br>";			//<-- Call the admin_no
			echo "ISBN: ".$data["ISBN"]."<br>";	//<-- Call the name
			echo "Borrow Date: ".$data["Borrow_Date"]."<br>";
			echo "Return Date: ".$data["Return_Date"]."<br><br>";
			/*if ($Return==False){
				echo "Returned"."<br><br>";
			}else{
				echo "Borrowed"."<br><br>";
			}
			/*if(["Return"]==FALSE) {
			var_export(false, 1);
			}else{
				var_export(true,0);
			}
			
			// echo $Status;
			/* echo strbool($Status)."<br><br>";*/
		  }	
		?>
		<br>
</font face>
	</body>
</html>