<?php
include 'user/header.php';
?>


			
			<div class="hero">
				<div class="slider">
					<ul class="slides">

						<li class="lazy-bg" data-background="dummy/slide-1.jpg">
							<div class="container">
								<h2 class="slide-title">Selamat Datang di Studio DW</h2>
								<h3 class="slide-subtitle">Jl Sriwijaya Gang 1 Blok C Nomer 4a</h3>
								<p class="slide-desc">Music Is my Soul, following like a flow</p>

								<!--<a href="#" class="button cut-corner">Read More</a>-->
							</div>
						</li>

						<li class="lazy-bg" data-background="dummy/slide-2.jpg">
							<div class="container">
									<h2 class="slide-title">Selamat Datang di Studio DW</h2>
									<h3 class="slide-subtitle">Contact Person 082234764309 a.n. Dedi</h3>
									<p class="slide-desc">Music Is my Soul, following like a flow</p>
							</div>
						</li>

						<li class="lazy-bg" data-background="dummy/slide-3.jpg">
							<div class="container">
									<h2 class="slide-title">Selamat Datang di Studio DW</h2>
							
								<p class="slide-desc">Music Is my Soul, following like a flow</p>

									
							</div>
						</li>
					</ul>
				</div>
			</div>
			
			<main class="main-content">
				<div class="fullwidth-block testimonial-section">
					<div class="container">
						<div class="quote-slider">
							<ul class="slides">
								<?php
								$informasi = mysql_query("select * from informasi,user where informasi.iduser = user.id");
								while($ainformasi = mysql_fetch_array($informasi))
								{
									?>
									<li>
										<blockquote>
											<p><?php echo $ainformasi['isi'];?></p>
											<cite><?php echo $ainformasi['level'];?>, Tanggal Post <?php echo $ainformasi['tanggal'];?></cite>
										</blockquote>
									</li>
									<?php
								}
								?>
								
								
							</ul>
						</div>
					</div>
				</div> <!-- .testimonial-section -->

				<div class="fullwidth-block upcoming-event-section" data-bg-color="#191919">
					<div class="container">
						<header class="section-header">
							<h2 class="section-title">Ruanggan Yang sedang terpakai</h2>

							<div class="event-nav">
								<a class="prev" id="event-prev" href="#"><i class="fa fa-caret-left"></i></a>
	    						<a class="next" id="event-next" href="#"><i class="fa fa-caret-right"></i></a>
							</div> <!-- .event-nav -->

						</header> <!-- .section-header -->

						<div class="event-carousel">
							<?php
							$today = mysql_query("select curdate() - interval 1 day as now");
							$td = mysql_fetch_array($today);
							$td1 = $td['now'];
							$queryjadwal = mysql_query("select *, user.nama as namus from pesan, user, tbl_ruang where pesan.idpemesan = user.id and tbl_ruang.id = pesan.ruangan and pesan.tanggal > '$td1' order by tanggal asc");
							#$jadwal = mysql_query("select * from jadwal,tbl_ruang where jadwal.ruangan = tbl_ruang.id and tanggal = ('select curdate() - interval 1 day') ");
							while($ajadwal = mysql_fetch_array($queryjadwal))
							{
								$tgl = $ajadwal['tanggal'];
								$array1 = explode("-", $tgl);
								$y = $array1[0];
								$m = $array1[1];
								$d = $array1[2];
								?>
								<div class="event">
									<div class="entry-date">
										<div class="date"><?php echo $d;?></div>
										<span class="month">
											<?php
											if($m == 1)
											{
												echo 'Jan';
											}elseif($m == 2){
												echo 'Feb';
											}elseif($m == 3) {
												echo 'Mar';
											}elseif($m == 4){
												echo 'Apr';
											}elseif($m == 5){
												echo 'Mei';
											}elseif($m == 6){
												echo 'Jun';
											}elseif($m == 7){
												echo 'Jul';
											}elseif($m == 8){
												echo 'Ags';
											}elseif($m == 9){
												echo 'Sep';
											}elseif($m == 10){
												echo 'Okt';
											}elseif($m == 11){
												echo 'Nov';
											}elseif($m == 12){
												echo 'Des';
											}
											?>
										</span>
									</div>
									<h2 class="entry-title"><a href="#"><?php echo $ajadwal['nama'];?></a></h2>
									<p><?php echo 'Jam: '.$ajadwal['jam'].'<Br>Pemesan :'.$ajadwal['namus'];?></p>
								</div>
								<?php
							}
							
							?>
							 <!-- .event -->
							
							
							<!-- .event -->
							
						</div> <!-- .event-carousel -->
					</div> <!-- .container -->
				</div> <!-- .upcoming-event-section -->

				<!--<div class="fullwidth-block why-chooseus-section">
					<div class="container">
						<h2 class="section-title">Why choose us?</h2>

						<div class="row">
							<div class="col-md-4">
								<div class="feature">
									<figure class="cut-corner">
										<img src="dummy/medium-image-1.jpg" alt="">
									</figure>
									<h3 class="feature-title">Similique sunt in culpa qui officia deserunt mollitia animi laborum dolorum</h3>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
								</div> <!-- .feature -->
					<!--		</div>
							<div class="col-md-4">
								<div class="feature">
									<figure class="cut-corner">
										<img src="dummy/medium-image-2.jpg" alt="">
									</figure>
									<h3 class="feature-title">Similique sunt in culpa qui officia deserunt mollitia animi laborum dolorum</h3>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
								</div> <!-- .feature -->
				<!--			</div>
							<div class="col-md-4">
								<div class="feature">
									<figure class="cut-corner">
										<img src="dummy/medium-image-3.jpg" alt="">
									</figure>
									<h3 class="feature-title">Similique sunt in culpa qui officia deserunt mollitia animi laborum dolorum</h3>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
								</div> <!-- .feature -->
						<!--	</div>
						</div>
					</div> <!-- .container -->
				<!--</div> <!-- .why-chooseus-section -->
			</main> <!-- .main-content -->

		<?php
		include 'user/footer.php';
		?>