<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-left">
				<p><a href="index.php">Tenus Stors | Belanja Berbagai Kain Tenun Khas Lombok </a></p>
			</div>
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<span class="caret"></span></a>
						<ul class="dropdown-menu">
<?php if(empty($_SESSION['email'])){?>
							<li><a href="index.php?mod=customer&pg=login">Login </a></li> 
							<li><a href="index.php?mod=customer&pg=register">Sign Up</a></li> 

<?php }?>
<?php if(!empty($_SESSION['email'])){?> 
							<li><a href="index.php?mod=customer&pg=order">My Orders</a></li>  
							<li><a href="index.php?mod=customer&pg=account">Profil</a></li>
							
							<li><a href="content/customer/logout.php">Logout</a></li>
							<?php }?> 

						</ul> 
					</li> 
					<li class="dropdown head-dpdn">
						<a href="index.php?mod=customer&pg=keranjang" class="dropdown-toggle"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Keranjang Belanja</a>
					</li> 					
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
		<div class="header-two"><!-- header-two -->
			<div class="container">
				<div class="header-logo">
					<h1><a href="index.php"><span>T</span>enun <i>Stors</i></a></h1>
					<h6>Stors berbagai macam kain tenun khas Lombok.</h6> 
				</div>	
				<div class="header-search">
					<form action="index.php?mod=produk&pg=search" method="post">
						<input type="search" name="Search" placeholder="Search for a Product..." required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
					</form>
				</div>
				<div class="header-cart"> 
					<div class="my-account">
                    <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> HOME </a> |  
                    <a href="index.php?mod=produk&pg=produk"><i class="fa  fa-shopping-cart" aria-hidden="true"></i> PRODUK </a> | 
					<a href="index.php?mod=pages&pg=kontak"><i class="fa fa-map-marker" aria-hidden="true"></i> CONTACT US</a>
					<a href="index.php?mod=pages&pg=cara_pembayaran"><i class="fa fa-laptop" aria-hidden="true"></i> CARA PEMBAYARAN</a> 						
					</div>
					<div class="cart"> 
						
							<a href="index.php?mod=customer&pg=keranjang"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button></a>
						 
					</div>
					<div class="clearfix"> </div> 
				</div> 
				<div class="clearfix"> </div>
			</div>		
		</div><!-- //header-two -->
		<div class="header-three"><!-- header-three -->
			<div class="container">
				
				<div class="move-text">
					<div class="marquee"><a href="index.php?mod=produk&pg=produk"> Nikmati Berbelanja Mudah di Tenun Stors <span>Dapatkan dengan harga Termurah </span> <span> Berbagai macam Kain tenun kualitas dunia</span></a></div>
					<script type="text/javascript" src="js/jquery.marquee.min.js"></script>
					<script>
					  $('.marquee').marquee({ pauseOnHover: true });
					  //@ sourceURL=pen.js
					</script>
				</div>
			</div>
		</div>
	</div>
