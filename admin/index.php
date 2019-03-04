<?php

include '../koneksi.php';
include 'header.php';
#sql approve member + deposit

	if(isset($_POST['appmember']))
	{
		$id = $_POST['id'];
		$depo = $_POST['deposit'];

		
		if($depo < 25000)
		{
			echo '<script>alert("deposit minimum Rp. 25.000");location.href="index.php"</script>';
		}else{
			mysql_query("update user set deposit='$depo', stat='1' where id='$id'");
			echo '<script>alert("Sukses di approve");location.href="index.php"</script>';
		}

	}
	if(isset($_POST['apppesan']))
	{
		$id = $_POST['id'];
		mysql_query("update pesan set status ='1' where id = '$id'");
		echo '<script>alert("Sukses Pelunasan")</script>';
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<!-- panel top -->
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php
								$Esewab = mysql_query("select count(id) as jum from pesan where status ='0'");
								$aEsewab = mysql_fetch_array($Esewab);
								echo $aEsewab[0];
								?>
							</div>
							<div class="text-muted">Pesan Studio</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked female-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php
							$cekdaftarmember = mysql_query("select count(id) as jum from user where stat ='0'");
							$acekdafmem = mysql_fetch_array($cekdaftarmember);
							echo $acekdafmem['jum'];
							?>
								
							</div>
							<div class="text-muted">Member Daftar</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php
									$cekmem = mysql_query("select count(id) as jum from user where stat ='1'");
									$acekmem = mysql_fetch_array($cekmem);
									echo $acekmem[0];
								?>
							</div>
							<div class="text-muted">Jumlah Member</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
								<?php
									$Esewa = mysql_query("select count(id) as jum from pesan where status ='1'");
									$aEsewa = mysql_fetch_array($Esewa);
									echo $aEsewa[0];
								?>
								
							</div>
							<div class="text-muted">Total Sewa</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		<!-- content -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading"> Approve Member </div>
					<div class="panel-body">
						
							<table class="table table-responsive">
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Telpon</th>
									<th>Username</th>
									
									<th>Deposit</th>
									<th>Aksi</th>
								</tr>
								<tr>
									<?php
									$member = mysql_query("select * from user where stat='0'");
									$no = 1;
									while($amember = mysql_fetch_array($member))
									{
										echo '
										<form action="" method="post">	<tr>
											<td>'.$no.'</td>
											<td>'.$amember['nama'].'</td>
											<td>'.$amember['alamat'].'</td>
											<td>'.$amember['telp'].'</td>
											<td>'.$amember['user'].'</td>
											<td><input type="hidden" name="id" value="'.$amember['id'].'">
												<input type="number" min="0" name="deposit" class="form-control" required=""></td>
											<td>

												<input type="submit" name="appmember" value="Approve" class="btn btn-warning">
											</td>
											</tr>
										</form>';
									}

									?>
								</tr>
							</table>
						
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Approve Pemesanan
					</div>
				
					<div class="panel-body">
						<table class="table table-responsive">
							<tr>
								<th>No</th>
								<th>Pemesan</th>
								<th>Ruangan</th>
								<th>Jam</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
							<?php
							$no = 1;
							$pesan = mysql_query("select *, pesan.id as idpes, user.nama as namauser, tbl_ruang.nama as namaruang from user,pesan,tbl_ruang where pesan.idpemesan = user.id and pesan.ruangan = tbl_ruang.id and tanggal > curdate() - interval 1 day and pesan.status < '1'");
							$cekpesan = mysql_num_rows($pesan);
							while($apesan = mysql_fetch_array($pesan))
							{
								if($cekpesan > 0)
								{
									echo '<form method="post" action="">
									<tr>
										<td>'.$no.'</td>
										<td>'.$apesan['namauser'].'</td>
										<input type="hidden" name="id" value="'.$apesan['idpes'].'">
										<td>'.$apesan['namaruang'].'</td>
										<td>'.$apesan['jam'].'</td>
										<td>'.$apesan['tanggal'].'</td>
										<td><input type="submit" name="apppesan" class="btn btn-info" value="Pelunasan"></td>
									</tr>
									</form>';
									$no++;
								}else{
									echo '<tr>
										<td colspan="1">Data Kosong</td>
											</tr>';
								}
								
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- end content -->
		
</div>
<?php
include 'footer.php';
?>
