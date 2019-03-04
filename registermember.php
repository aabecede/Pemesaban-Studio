<?php

include 'user/header.php';
include 'koneksi.php';
#registrasi atau daftar member baru
	if(isset($_POST['regis']))
	{
		$nama = $_POST['nama'];
		$alm = $_POST['alamat'];
		$telp = $_POST['telp'];
		$user = $_POST['user'];
		$psw = $_POST['pass'];
		$query = mysql_query("insert into user(nama,alamat,telp,user,pass,level,stat) values('$nama','$alm','$telp','$user','$psw','user','0')") or die(mysql_error());
		if($query)
		{
			echo '<script>alert("Sudah terdaftar, silahkan konfirmasi ditempat.<br> Alamat ada di ....");href.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal daftar");</script>';
		}
	}

?>
<main class="main-content">
	<div class="fullwidth-block inner-content">
		<div class="container">
			<h2 class="page-title">Register Member</h2>
			<div class="row">
				<div class="col-lg-6">
					<form method="post" action="" class="contact-form">
						<table>
							<tr>
								<td><input type="text" name="nama" placeholder="Nama . . . " required="">
							</tr>
							<tr>
								<td><input type="text" name="alamat" placeholder="Alamat . . ." required="">
							</tr>
							<tr>
								<td><input type="number" min="0" name="telp" placeholder="08xxxxxx" required="">
							</tr>
							<tr>
								<td><input type="text" name="user" placeholder="Username" required="">
							</tr>
							<tr>
								<td><input type="password" name="pass" required="">
							</tr>
							<tr>
								<td><input type="submit" name="regis" value="Daftar">
							</tr>
						</table>	
					</form>
				</div>
				<div class="col-lg-6">
					<div class="map-wrapper">
						<div class="row">
							<address>
								<strong>Persyaratan Daftar Member</strong>
								<br>
								<span>Isi sendiri ya
								</span>
							</address>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
include 'user/footer.php';
?>