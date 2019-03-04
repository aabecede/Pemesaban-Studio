<?php
session_start();
include '../koneksi.php';
$user = $_SESSION['user'];
$cekuser = mysql_query("select * from user where user='$user'");
$acekuser = mysql_fetch_array($cekuser);
if($acekuser['level'])
{


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Verifikasi</title>

<link href="../lumino/css/bootstrap.min.css" rel="stylesheet">
<link href="../lumino/css/datepicker3.css" rel="stylesheet">
<link href="../lumino/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../lumino/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span></span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $user;?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
						<!--	<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li> -->
							<li><a href="../log.php?op=out"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Verifikasi</a></li>
		<!--	<li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Approve Register</a></li>
		<!--	<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			
			<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Approve Pemesanan</a></li> -->
			<li><a href="jadwal.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Jadwal</a></li>
			<li><a href="informasi.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Informasi</a></li>
            
            <li><a href="infouser.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></use></svg> Informasi User</a></li>
			
			<li class="parent ">
				<a href="laporanpenyewaan.php">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Laporan 
				</a>
				<!--<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Harian
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Mingguan
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Bulanan
						</a>
					</li>
				</ul> -->
			</li>
			
		</ul>

	</div><!--/.sidebar-->
	<?php
}else{
	echo '<script>alert("Anda Belum Login");location.href="../index.php"</script>';
}
	?>
