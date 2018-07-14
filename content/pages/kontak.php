<div class="contact">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Contact Us</h3>  
			
			<div class="contact-form-row">
				
				<div class="col-md-7 contact-left">
                <h4 class="w3ls-title w3ls-title1">Kirim Pesan</h4>  
					<form action="content/pages/sim_kom.php" method="post">
						<input type="text" value="<?php if(!empty($_SESSION['email'])){echo $data_user['nama'];}?>"" name="nama" placeholder="Name" required="">
						<input class="email" value="<?php if(!empty($_SESSION['email'])){echo $_SESSION['email'];}?>" type="text" name="email" placeholder="Email" required="">
						<textarea placeholder="Message" name="komentar" required=""></textarea>
						<input type="submit" value="KIRIM">
					</form>
				</div> 
				<div class="col-md-4 contact-right">
					<div class="cnt-w3agile-row">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-whatsapp" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>081805772571</p> 
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="cnt-w3agile-row cnt-w3agile-row-mdl">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>siddiqfisamalaka@gmail.com</p> 
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="cnt-w3agile-row">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>Jln.Sukarara, Kecamatan Jonggat,<br> Lombok Tengah, NTB</p> 
						</div>
						<div class="clearfix"> </div>
					</div>
				</div> 
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact-page --> 