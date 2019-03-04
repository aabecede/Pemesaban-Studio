<link href="../lumino/css/bootstrap.min.css" rel="stylesheet">
<link href="../lumino/css/datepicker3.css" rel="stylesheet">
<link href="../lumino/css/styles.css" rel="stylesheet">

<?php
include '../koneksi.php';

$arr1 = $_POST['tanggal1'];
$arr12 = $_POST['tanggal2'];
$today = mysql_query("select curdate() as date");
$date = mysql_fetch_array($today);
$sql = mysql_query("select *,pesan.deposit as depo, user.nama as namaus, tbl_ruang.nama as namaruang from pesan,user,tbl_ruang where pesan.idpemesan = user.id and pesan.ruangan = tbl_ruang.id and pesan.tanggal between '$arr1' and '$arr12'")or die(mysql_error());

echo '<h2 class="page-header" align="center">Laporan Penyewaan Studio DW</h2>
			<div class="col-lg-12">
										<table class="table table-responsive" boder="1">
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
												<td colspan="5" align="right">Jember,</td>
												<td>'.$date['date'].'</td>
											</tr>
											
									</table>
										</div>';

?>

<script type="text/javascript">
	window.print();
</script>
<script src="../lumino/js/jquery-1.11.1.min.js"></script>
	<script src="../lumino/js/bootstrap.min.js"></script>
	<script src="../lumino/js/chart.min.js"></script>
	<script src="../lumino/js/chart-data.js"></script>
	<script src="../lumino/js/easypiechart.js"></script>
	<script src="../lumino/js/easypiechart-data.js"></script>
	<script src="../lumino/js/bootstrap-datepicker.js"></script>