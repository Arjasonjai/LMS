<?php
$connect_error = 'Cannot connect.';
mysql_connect('localhost', 'root', 'usbw') or die($connect_error);
mysql_select_db('lms') die($connect_error);

?>