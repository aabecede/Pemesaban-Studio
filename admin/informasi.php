<?php
include 'header.php';
include '../koneksi.php';
$clvl = mysql_query("select * from user where nama='$user'");
$aclvl = mysql_fetch_array($clvl);
$aclvll = $aclvl['id'];
	if(isset($_POST['informasi']))
	{
		$isi = $_POST['content'];
		$today = mysql_query("select curdate()");
		$atoday = mysql_fetch_array($today);
		$ato = $atoday[0];
		if($isi == '')
		{

		}else{
		
			mysql_query("insert into informasi(iduser,isi,tanggal) value('$aclvll','$isi','$ato')");
		}
		
	}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Informasi</h1>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel panel-heading">Tambah Informasi</div>
				<div class="panel-body">
					<form action="" method="post">
						<textarea class="form-control" name="content" placeholder="Isi Informasi . . . "></textarea><br>
						<input type="submit" name="informasi" value="POST" class="btn btn-info">
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel panel-heading">Informasi Terakhir</div>
				<div class="panel-body">
					<?php
					$no = 1;
					$informasi = mysql_query("select * from informasi, user where informasi.iduser = user.id limit 0,5");
					while($ainformasi = mysql_fetch_array($informasi))
					{
						echo '<table class="table table-responsive">
								'.$ainformasi[2].'<br>Terakhir di Post tanggal '.$ainformasi['tanggal'].'
							</table>
							 ';
							 
					}
					?>
					<a href="informasilainnya.php" class="btn btn-default">Informasi Lainnya</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>