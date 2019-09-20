<!DOCTYPE html>
<html>
<body>
<style>
body {
    background-color:#FBFBEF
}
</style>

<font face="calibri">
<?php
$fine='0';
$return=False;
$return1=False;
$return2=False;
$return3=False;
date_default_timezone_set('Asia/Hong_Kong');
$now=new DateTime();
$con=mysql_connect("localhost","root","usbw");        
mysql_select_db("lms",$con);
    $sql=mysql_query("select * from lms.transactions");
	mysql_query("UPDATE lms.transactions SET `Return`=1 WHERE ISBN='$_POST[ISBN1]'");
    while($data=mysql_fetch_array($sql)){
		if($_POST['ISBN1']==$data["ISBN"]and $data['Return']=='0'){
	        $return=True;
			$return1=True;
			$borrow_date=new DateTime($data["Borrow_Date"]);
			$diff=date_diff($borrow_date,$now);
			$diff_int=intval($diff->format("%R%a"));
			if($diff_int>7){
				$fine=($fine+$diff_int-7);
			}
		}
        		
 
    }
if ($return1==False){
	echo'<h3><center>The book '.$_POST['ISBN1'].' has NOT been borrowed yet</center></h3><br>';
}


if ($return==True){
	echo "<h3><center>Returned</center><br>";
	echo "<center>Fine: $ ".$fine." <br>($1.0 per book per day)</center></h3><br><br>";
}

mysql_close($con);
?>
<center><a href="return.php">Back To Previous Page</a></center><br><br>
<center><a href="http://localhost/">HomePage</a></center><br><br>
</font>
</body>
</html>