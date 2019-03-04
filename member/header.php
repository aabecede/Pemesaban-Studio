<?php
session_start();
$user = $_SESSION['user'];
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Studio DW</title>
		<!-- Loading third party fonts -->
		
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
<style type="text/css">
	/* jwpopup box style */
.jwpopup {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 110px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.7);
}
.jwpopup-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    max-width: 500px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

.jwpopup-head {
	font-size: 11px;
    padding: 1px 16px;
    color: white;
    background: #006faa; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#006faa, #002c44); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#006faa, #002c44); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#006faa, #002c44); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#006faa, #002c44); /* Standard syntax */
}
.jwpopup-main {padding: 5px 16px;}
.jwpopup-foot {
	font-size: 12px;
    padding: .5px 16px;
    color: #ffffff;
    background: #006faa; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#006faa, #002c44); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#006faa, #002c44); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#006faa, #002c44); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#006faa, #002c44); /* Standard syntax */
}

/* tambahkan efek animasi */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* style untuk tombol close */
.close {
	margin-top: 7px;
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover, .close:focus {
    color: #999999;
    text-decoration: none;
    cursor: pointer;
}
</style>
	</head>

		<body class="header-collapse">
		
		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index.html" id="branding">
					<img src="dummy/logo.png" alt="Site Title">

						<small class="site-description">Slogan goes here</small>
					</a> <!-- #branding -->
					
					<nav class="main-navigation">
						<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
							<!--<li class="menu-item"><a href="about.php">Tentang</a></li>-->
							<li class="menu-item"><a href="jadwal.php">Jadwal</a></li>
							<!--<li class="menu-item"><a href="download.html">Galeri</a></li>-->
							<!--<li class="menu-item"><a href="blog.html">Blog</a></li>-->
							<li class="menu-item"><a href="kontak.php">Kontak</a></li>
							<li class="menu-item"><a href="javascript:void(0);" id="jwpopupLink"><span class="glyphcon glyphcon-user"></span>Login</a></li>
						</ul> <!-- .menu -->
					</nav> <!-- .main-navigation -->
					<div class="mobile-menu"></div>
				</div>
			</header> <!-- .site-header -->

			<!-- pop up login -->
		<div id="jwpopupBox" class="jwpopup">
	<!-- jwpopup content -->
	<div class="jwpopup-content">
		<div class="jwpopup-head">
				<span class="close">×</span>
				<h2>Silahkan Login</h2>
			</div>
			<div class="jwpopup-main">
			<form method="post" action="log.php?op=in" class="contact-form">
				<table>
					<tr>
						<td>Username :</td>
						<td><input type="text" name="user" required=""></td>
					</tr>
					<tr>
						<td>Password :</td>
						<td><input type="password" name="pass" required=""></td>
					</tr>
					<tr>
						<td><input type="submit" value="Login"></td>
						<td><input type="reset" value="Cancel"></td>
					</tr>
				</table>
			</form>
				<a href="registermember.php"><div class="button">Daftar Member</div></a>
			</div>
			<div class="jwpopup-foot">
				<p>Selamat Datang di Studio DW</p>
			</div>
		</div>
	</div>
			<!-- End Pop UP Login -->

			<script type="text/javascript">
				// untuk mendapatkan jwpopup
			var jwpopup = document.getElementById('jwpopupBox');

			// untuk mendapatkan link untuk membuka jwpopup
			var mpLink = document.getElementById("jwpopupLink");

			// untuk mendapatkan aksi elemen close
			var close = document.getElementsByClassName("close")[0];

			// membuka jwpopup ketika link di klik
			mpLink.onclick = function() {
			    jwpopup.style.display = "block";
			}

			// membuka jwpopup ketika elemen di klik
			close.onclick = function() {
			    jwpopup.style.display = "none";
			}

			// membuka jwpopup ketika user melakukan klik diluar area popup
			window.onclick = function(event) {
			    if (event.target == jwpopup) {
			        jwpopup.style.display = "none";
			    }
			}
			</script>