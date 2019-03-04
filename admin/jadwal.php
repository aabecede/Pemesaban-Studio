<?php
error_reporting(0);
include 'header.php';
include '../koneksi.php';
?>
<link rel="stylesheet" href="jquery-ui.css" type="text/css"/>
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery-ui.js" type="text/javascript"></script>

<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="col-lg-12">		
	<h2 class="page-header">Ruangan yang terpakai</h2>
		<div class="panel panel-default">
			<div class="panel-body">
				<form action="" method="post">
					<div class="col-lg-2">
						<input type="text" id="datepicker" required="" placeholder="Tanggal" name="tanggal" readonly="" class="form-control">
					</div>
					<div class="col-lg-2">
						<select name="jam" class="form-control">
						<?php
						for($i=8;$i<=24;$i++)
						{
					    	if($i<10)
					    	{
					    		echo '<option value="0'.$i.':00">0'.$i.':00</option>';
					    	}else{
					    		echo '<option value="'.$i.':00">'.$i.':00</option>';
					    	}
					    }
						?>
						</select>

					</div>
					<input type="submit" name="cari" value="Cari" class="btn btn-info">
				</form>
				<br>
				<?php
				$cari = @$_POST['cari'];
				$tgl = @$_POST['tanggal'];
				$jam = @$_POST['jam'];

#				echo $tgl;

				$arr = explode("/",$tgl);
				$m = $arr[0];
				$d = $arr[1];
				$y = $arr[2];
				$arr1 = array($y,$m,$d);
				$arr1 = implode("-",$arr1);

				if($cari)
				{

					if($tgl != '')
					{
						if($jam != '')
						{
							$sql = mysql_query("select * from jadwal,tbl_ruang where jadwal.ruangan = tbl_ruang.id and tanggal > (select curdate() - interval 1 day) and jadwal.tanggal like '%$arr1%' and jadwal.jam like '%$jam%' order by tanggal asc");
							$cek = mysql_num_rows($sql);
							if($cek < 1)
							{
								echo 'Data Kosong';

							}else{
								while($asql = mysql_fetch_array($sql))
								{
									echo '<div class="col-lg-3">
											<table class="table table-responsive">
												<tr>
													<td>Ruangan</td>
													<td>'.$asql['nama'].'</td>
												</tr>
												<tr>
													<td>Tanggal</td>
													<td>'.$asql['tanggal'].'</td>
												</tr>
												<tr>
													<td>Jam</td>
													<td>'.$asql['jam'].'</td>
												</tr>
											 </table>
											</div>';
								}	
							}
						}else{
							echo '<script>alert("Jam Tidak boleh kosong!!")</script>';
						}
						
					}else{
						echo '<script>alert("Tanggal Tidak boleh kosong !!")</script>';
					}
					
				}else{
					$sql = mysql_query("select *, user.nama as namus from pesan, user, tbl_ruang where pesan.idpemesan = user.id and tbl_ruang.id = pesan.ruangan and pesan.tanggal > (select curdate() - interval 1 day) order by tanggal asc");
						while($asql = mysql_fetch_array($sql))
						{
							echo '
								<div class="col-lg-3">
									<table class="table table-responsive">
										<tr>
											<td>Ruangan</td>
											<td>'.$asql['nama'].'</td>
										</tr>
										<tr>
											<td>Tanggal</td>
											<td>'.$asql['tanggal'].'</td>
										</tr>
										<tr>
											<td>Jam</td>
											<td>'.$asql['jam'].'</td>
										</tr>
										<tr>
											<td>Peminjam</td>
											<td>'.$asql['namus'].'</td>
										</tr>
								 	</table>
								</div>';
						}
				}

				?>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>
