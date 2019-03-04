<?php
error_reporting(0);
include"koneksi.php";
session_start();
$user=$_POST['user'];
$pass=$_POST['pass'];
$op=$_GET['op'];

if ($op=="in"){
	$query=mysql_query("select * from user where user='$user' and pass='$pass' and stat='1'");
	if(mysql_num_rows($query)==1){
		$c=mysql_fetch_array($query);
		$_SESSION['user']=$c['user'];
		$_SESSION['level']=$c['level'];
			}if($c['level']=="admin"){
				echo"<script>alert('Selamat Datang Admin');window.location='admin/index.php'</script>";
			}elseif($c['level']=="user"){
				$_SESSION['user'] = $user;
				echo"<script>alert('Selamat Datang di DW Studio');window.location='member/index.php'</script>";
			}else{
			
				echo"<script>alert('kata sandi tidak cocok');window.location='index.php'</script>";
			}
}elseif($op=="out"){
	unset($_SESSION['user']);
	unset($_SESSION['level']);
	echo"<script>alert('Anda telah Logout');window.location='index.php'</script>";
}
?>