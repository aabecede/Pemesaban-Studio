<?php
error_reporting(0);
include 'header.php';
?>
<link rel="stylesheet" href="jquery-ui.css" type="text/css"/>
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery-ui.js" type="text/javascript"></script>

<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  $(function(){
  	$("#datepicker1").datepicker();
  })
</script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	<div class="col-lg-12">
		<h2 class="page-header">Laporan Penyewaan</h2>
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="" method="post">
					<div class="col-lg-2">
						<input type="text" id="datepicker" required="" placeholder="Tanggal awal" name="tanggal" readonly="" class="form-control">

					</div>
					<div class="col-lg-2">
						<input type="text" id="datepicker1" required="" placeholder="Tanggal akhir" name="tanggal1" readonly="" class="form-control">
					</div>
					<!--<div class="col-lg-2">
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

					</div>-->
					<input type="submit" name="cari" value="Cari" class="btn btn-info">
				</form>
				<br>
				<?php
				$cari = @$_POST['cari'];
				$tgl = @$_POST['tanggal'];
				$tgl1 = @$_POST['tanggal1'];

				$arr = explode("/",$tgl);
				$m = $arr[0];
				$d = $arr[1];
				$y = $arr[2];
				$arr1 = array($y,$m,$d);
				$arr1 = implode("-",$arr1);

				$arr2 = explode("/",$tgl1);
				$m2 = $arr2[0];
				$d2 = $arr2[1];
				$y2 = $arr2[2];
				$arr12 = array($y2,$m2,$d2);
				$arr12 = implode("-",$arr12);

				if($cari)
				{
					if($tgl != '')
					{
						if($tgl1 != '')
						{
							$sql = mysql_query("select *,pesan.deposit as depo, user.nama as namaus, tbl_ruang.nama as namaruang from pesan,user,tbl_ruang where pesan.idpemesan = user.id and pesan.ruangan = tbl_ruang.id and pesan.tanggal between '$arr1' and '$arr12'")or die(mysql_error());
							$cek = mysql_num_rows($sql);
							if($cek < 1)
							{
								echo '<script>alert("Data Kosong !")</script>';
							}else{
								echo '<div class="col-lg-12">
										<table class="table table-responsive">
											<tr>
												<th>No</th>
												<th>Pemesan</th>
												<th>Ruangan</th>
												<th>Jam</th>
												<th>Tanggal</th>
												<th>Deposit</th>
											</tr>';
											$no = 1;
								while($asql = mysql_fetch_array($sql))
								{
									echo '<tr>
											<td>'.$no.'</td>
											<td>'.$asql['namaus'].'</td>
											<td>'.$asql['namaruang'].'</td>
											<td>'.$asql['jam'].'</td>
											<td>'.$asql['tanggal'].'</td>
											<td> Rp '.number_format($asql['depo'],0,',','.').'</td>
										  </tr>';
										  @$Edep = $Edep + $asql['depo'];
										  $no++;
								}

								echo '		<tr>
												<td colspan="5" align="right">Total</td>
												<td> Rp '.number_format($Edep,0,',','.').'</td>
											</tr>
											<tr>
												<td colspan="6" align="right">
												<form action="cetaklaporan.php" method="post" onclick="return konfirmasi()" target="_blank">
													<input type="hidden" name="tanggal1" value='.$arr1.'>
													<input type="hidden" name="tanggal2" value='.$arr12.'>
													<input type="submit" value="Cetak Laporan" class="btn btn-danger">
												</form>
												</td>
											</tr>
									</table>
										</div>';
							}
						}else{
							echo '<script>alert("Tanggal Akhir tidak boleh kosong !")</script>';
						}
					}else{
						echo '<script>alert("Tanggal Awal Tidak boleh Kosong !");</script>';
					}
				}else{
					echo 'Silahkan Pilih Tanggal';
				}

				?>
				</div>
			</div>
	</div>
</div>
<?php
include 'footer.php';
?>
<script type="text/javascript">
	function konfirmasi()
	{
		tanya = confirm("Yakin untuk di cetak ?");
		if(tanya==true) return true;
		else
			return false;
	}
</script>