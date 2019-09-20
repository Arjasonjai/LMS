<?php
  $con=mysql_connect("localhost","root","usbw");        //<-- Connect to server
  mysql_select_db("lms",$con);				//<-- select database ict
?>
<!DOCTYPE html>
<html>
<head>
<font face="Comic Sans MS">
<center><title>User Information</title></center>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
</head>
<body>
<body bgcolor="#F7F8E0">
<center><h1>User Information</h1></center>

<!-- Search user: 

<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 200px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 30px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style> 

  <form id="searchform" method="post" onsubmit="return false;">
<input autocomplete="off" id="searchbox" name="searchq" onkeyup="sendRequest()" type="textbox">
  </form>
<div id="show_results">
</div>
<script src="prototype.js" type="text/javascript">
</script>
  <script>
   function sendRequest() {
    new Ajax.Updater('show_results', 'search.php', { method: 'post', parameters: $('searchform').serialize() });
   }
   
</script>
<body>
    <div class="search-box">
        <input type="text" name="search" autocomplete="off" placeholder="Type Username Here..." onkeyup="showResult(this.value)" />
        <div id="search"></div>
    </div>
</body>
</html> -->

<br><br><?php
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
</font face>
</body>
</html>