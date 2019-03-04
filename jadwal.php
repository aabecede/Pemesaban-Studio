<?php

include 'user/header.php';
include 'koneksi.php';
?>
			
			<main class="main-content">
				<div class="fullwidth-block gallery">
					<div class="container">
						<div class="content fullwidth">
							<h2 class="entry-title">Jadwal Pemakaian Studio</h2>
							<div class="filter-links filterable-nav">
								<select class="mobile-filter">
									<option value="*">Show all</option>
									<option value=".concert">Concert</option>
									<option value=".band">Band</option>
									<option value=".stuff">Stuff</option>
									<?php

									$query = mysql_query("select * from tbl_ruang") or die (mysql_error());

									
											while($aruang = mysql_fetch_array($query))
										{
											echo '<option value=".'.$aruang['id'].'"> '.$aruang['nama'].' </option>';
										}
									
									?>
								</select>
								
								<a href="#" class="current" data-filter="*">Show all</a>
								<!--<a href="#" data-filter=".concert">Concert</a>
								<a href="#" data-filter=".band">Band</a>
								<a href="#" data-filter=".stuff">Stuffy</a>-->
								<?php
								$selectruang = mysql_query("select * from tbl_ruang")or die(mysql_error());
								while($asel = mysql_fetch_array($selectruang))
								{
									echo '<a href="#" data-filter=".'.$asel['id'].'">'.$asel['nama'].'</a>';
								}
								?>
							</div>
							<div class="filterable-items">
								
								<?php
								$today = mysql_query("select curdate() - interval 1 day as now");
								$atoday = mysql_fetch_array($today);
								$now = $atoday['now'];
								$seljadwal = mysql_query("select * from jadwal where tanggal > '$now' order by tanggal asc");
								
								while($Ejadwal = mysql_fetch_array($seljadwal))
								{
									echo '<div class="filterable-item '.$Ejadwal['ruangan'].'">
											<table>
												<tr>
													<td>Dipesan Tanggal</td>
													<td>'.$Ejadwal['tanggal'].'</td>
												</tr>
												<tr>
													<td>Di Pakai Pukul</td>
													<td>'.$Ejadwal['jam'].'</td>
												</tr>
											</table>
										 </div>';
								}
								?>
							</div>
						</div>
					</div>
				</div> <!-- .testimonial-section -->

				
			</main> <!-- .main-content -->

	<?php
	include 'user/footer.php';
	?>