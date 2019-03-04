<?php
$conn = mysql_connect("localhost","root","");
$db = mysql_select_db("studio");

if(isset($_POST['test']))
{
	$jam = $_POST['jam'];
	$curtime = mysql_query("select curtime() as time");
	$acur = mysql_fetch_array($curtime);
	$time = $acur['time'];
}



?>

<form action ="" method="POST">
	<input type="text" name="jam">
	<input type="submit" name="test">
</form>

<?php
echo $acur['time'];
echo $jam;
?>