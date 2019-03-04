<?php
$conn = mysql_connect("localhost","root","");
$db = mysql_select_db("studio");
if($conn == true)
{
	#echo '<script>alert("Berhasil Bro");</script>';
}else{
	echo '<script>alert("Bermasalah");</script>';
}
?>