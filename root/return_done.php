<!DOCTYPE html>
<html>
<body>
<body bgcolor="#F7F8E0">

<font face="calibri">
<?php
include 'Return.php';
include_once 'dbh.inc.php';
$fine='0';
$return=False;
$return1=False;
$return2=False;
$return3=False;
date_default_timezone_set('Asia/Hong_Kong');
$timedate=date("Ymd");
$now=new DateTime();
$con=mysql_connect("localhost","root","usbw");        
mysql_select_db("lms",$con);
    $sql=mysql_query("select * from lms.transactions");
	mysql_query("UPDATE lms.transactions SET `Return`=1, `Return_Date`=$timedate WHERE `ISBN`='$_GET[ISBN1]'");
    while($data=mysql_fetch_array($sql)){
		if($_GET['ISBN1']==$data['ISBN']and $data['Return']=='0'){
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
	echo'<h3><center>The book '.$_GET['ISBN1'].' has NOT been borrowed yet</center></h3><br>';
}


if ($return==True){
	// mysql_query("UPDATE lms.books SET `Return`= 1 WHERE ISBN='$_POST[ISBN]'");
	echo "<h3><center>Returned</center><br>";
	echo "<center>Fine: $ ".$fine." <br>($1.0 per book per day)</center></h3><br><br>";
}


mysql_close($con);
?>
</body>
</font>
</html>