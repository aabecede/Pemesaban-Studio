
		<footer class="site-footer">
				<div class="container">
				<?php
				if($aceklvl['level'] == 'user')
				{
					?>
					<img src="../dummy/logo-footer.png" alt="Site Name">
					<?php
				}else{
					?>
					<img src="dummy/logo-footer.png" alt="Site Name">
					<?php
				}
				?>
					
					
					<address>
						<p>Studio DW<br><a href="tel:354543543">(563) 429 234 890</a> <br> <a href="mailto:info@bandname.com">info@bandname.com</a></p> 
					</address> 
					
				<!--	<form action="#" class="newsletter-form">
						<input type="email" placeholder="Enter your email to join newsletter...">
						<input type="submit" class="button cut-corner" value="Subscribe">
					</form> <!-- .newsletter-form -->
					
					<div class="social-links">
						<a href="#"><i class="fa fa-facebook-square"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
					</div> <!-- .social-links -->
					
				<!--	<p class="copy">Copyright 2017 Company Name. Designed by Themezy. All right reserved</p>-->
				<p class="copy">Copyright @2017 Apem(o)</p>
				</div>
			</footer> <!-- .site-footer -->

		</div> <!-- #site-content -->
<?php
if($aceklvl['level'] == 'user')
{
	?>
		<script src="../js/jquery-1.11.1.min.js"></script>		
		<script src="../js/plugins.js"></script>
		<script src="../js/app.js"></script>
	<?php
}else{
	?>
		<script src="js/jquery-1.11.1.min.js"></script>		
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
	<?php
}
?>
		
		
	</body>

</html>