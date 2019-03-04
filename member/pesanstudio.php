<?php

include '../koneksi.php';
include '../user/header.php';
$queryuser = mysql_query("select * from user where user ='$user'");
$aqueryuser = mysql_fetch_array($queryuser);
$iduser = $aqueryuser['id'];
	#pesanstudio
if(isset($_POST['pesan']))
{
	$id = $_POST['idpemesan'];
	$ruangan = $_POST['ruangan'];
	$jam = $_POST['jam'];
	$tgl  = $_POST['tanggal'];

	#cek deposit
	$depo = mysql_query("select * from user where id='$iduser' and deposit != 0");
	$countdep = mysql_num_rows($depo);
	$cekdepo = mysql_fetch_array($depo);
	$deposito = $cekdepo['deposit'];

	#cek ruangan apakah ruangan tersebut dipakai atau tidak

	$array1 = explode(":",$jam);
	$h = $array1[0] + 1;
	$m = $array1[1];
	$s = $array1[2];
	$plus1 = array($h,$m,$s);
	$plus1 =  implode(":",$plus1);
	$sk1 = array($tgl,$jam);
	$sekarang= implode(" ", $sk1);
	$nw = mysql_query("select curdate() as now");
	$nw1 = mysql_fetch_array($nw);
	$nw2 = $nw1['now'];
	$cek = mysql_query("SELECT * FROM `jadwal`where ruangan ='$ruangan' and tanggal='$tgl' and jam ='$jam'");
	
	$count = mysql_num_rows($cek);
	$curtime = mysql_query("select now() as sk");
	$acur = mysql_fetch_array($curtime);
	
	#pemesanan
	if($countdep > 0 )
	{
	
			if($count > 0 )
			{
				echo '<script>alert("Ruangan'.$ruangan.' Telah Di Pinjam di Jam '.$jam.' dan tanggal '.$tgl.'")</script>';
			}else{
				
				if($acur['sk'] > $sekarang)
				{
					echo '<script>alert("Sekarang sudah tanggal :'.$acur['sk'].'")</script>';
				}else{
						
					if($tgl >= $nw2)
					{
						$query = mysql_query("insert into pesan(idpemesan,ruangan,jam,tanggal,deposit,status) values('$id','$ruangan','$jam','$tgl','25000','0')");
							if($query)
						{
						$sisadepo = $deposito - 25000;
						$depomin = mysql_query("update user set deposit = '$sisadepo' where id='$id'");
									
						echo '<script>alert("Data Berhasil Masuk");</script>';
						$insertjadwal = mysql_query("insert into jadwal values ('$ruangan','$jam','$tgl')");			
						}else{
							echo '<script>aleret("Gagal")</script>';
						}
					}else{
						echo '<script>alert("Tidak bisa Meminjam Kurang dari Tanggal '.$nw2.'")</script>';
					}
				}
				
			}
	}else{
				echo '<script>alert("DEPOSIT TIDAK MENCUKUPI, SILAHKAN DICEK KEMBALI")</script>';
	}
}

#var_dump($sekarang);
?>
<main class="main-content">
	<div class="fullwidth-block inner-content">
		<div class="container">
			<div class="col-lg-6">
				<h2 class="page-title">Pesan Studio</h2>
				<form action="" name="pesan" method="post" enctype="multipart/form-data" class="contact-form">
					<table>
						<tr>
					    	<td>Nama</td>
					    	<td>
					        <input type="hidden" name="idpemesan" value="<?php echo $iduser;?>" />
					        <input type="text" disabled="disabled" value="<?php echo $user;?>" /></td>
					    </tr>
					    <tr>
					    	<td>Ruangan</td>
					        <td>
					        <select name="ruangan" required="">
							<?php
							$query = mysql_query("select * from tbl_ruang");
							while($arr = mysql_fetch_array($query))
							{
							?>
							    <option value="<?php echo $arr['id'];?>"><?php echo $arr['nama'];?></option>
							<?php
							}
							?>
					        </select>
					        </td>
					    </tr>
					    <tr>
					    	<td>Jam</td>
					        <td>
					        	<select name="jam" required="">
					        		<?php
					        		for($i=8;$i<=24;$i++)
					        		{
					        			if($i<10)
					        			{
					        				echo '<option value="0'.$i.':00:00">0'.$i.':00</option>';
					        			}else{
					        				echo '<option value="'.$i.':00:00">'.$i.':00</option>';
					        			}
					        		}
					        		?>
					        	</select>
					        </td>
					    </tr>
					    <tr>
					    	<td>Tanggal</td>
					        <td>

					        <input name="tanggal" readonly="" required="" value=""  size="24">&nbsp;<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pesan.tanggal);return false;"  ><img name="popcal" align="absmiddle" src="../calender/calbtn.gif" width="34" height="22" border="0" alt="" ></a>
							<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="../calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
							</iframe>
							
					        </td>
					    </tr>
					    <tr>
					    	<td><input type="submit" name="pesan" value="Pesan" /></td>
					    	<td><input type="reset" value="Reset" /></td>
					    </tr>
					</table>

				</form>
			</div>
			<div class="col-lg-6">
				<h2 class="page-title">Ruang Yang terpakai</h2>
				<table class="table">
				<tr>
					<th>Ruangan</th>
					<th>Tanggal</th>
					<th>Jam</th>
					<th>Pemesan</th>
				</tr>
					<?php
					$today = mysql_query("select curdate() - interval 1 day as now");
					$td = mysql_fetch_array($today);
					$td1 = $td['now'];
					$queryjadwal = mysql_query("select *, user.nama as namus from pesan, user, tbl_ruang where pesan.idpemesan = user.id and tbl_ruang.id = pesan.ruangan and pesan.tanggal > '$td1' order by tanggal asc");
					while($aqjwl = mysql_fetch_array($queryjadwal))
					{
						?>
						<tr>
							<td width="50%" align="center"><?php echo $aqjwl['nama'];?></td>
							<td width="50%" align="center"><?php echo $aqjwl['tanggal'];?></td>
							<td width="50%" align="center"><?php echo $aqjwl['jam'];?></td>
							<td width="50%" align="center"><?php echo $aqjwl['namus'];?></td>
						</tr>
						<?php
					}
					?>
				</table>
			</div>
		</div>
	</div>
</main>
<?php
include '../user/footer.php';
?>