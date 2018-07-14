<div class="banner">
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">  
                <div class="item active"><!-- First-Slide -->
                    <img src="images/5.jpg" alt="" class="img-responsive" />
                </div>  
            </div> 
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a> 
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> 
        </div>
		<script src="js/custom.js"></script>
	</div>
	<!-- //banner -->  
	<!-- welcome -->
	<div class="welcome"> 
		<div class="container"> 
			<div class="welcome-info">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs"
					<div class="clearfix"> </div>
					<h3 class="w3ls-title">Featured Products</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">  
								<div id="owl-demo" class="owl-carousel"> 
<?php $sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain ORDER BY kd_motif DESC
					") or die ("error");
					
					while($data=mysqli_fetch_array($sql)){?>
									<div class="item">
										<div class="glry-w3agile-grids agileits"> 
											<a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>"><img src="admin/content/motif/<?php echo $data['gambar'] ; ?>" alt="img"></a>
											<div class="view-caption agileits-w3layouts">           
												<h4><a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>"> <?php echo $data['nm_motif'] ; ?></a></h4>
												<p><?php echo $data['nm_jenis_kain'] ; ?></p>
												<h4>Rp.<?php echo number_format($data['harga'] ); ?></h4>
												
													<a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>">
													<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button></a>
												
											</div>   
										</div>   
									</div>

									<?php } ?>
								</div> 
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="carl" aria-labelledby="carl-tab">
							<div class="tabcontent-grids">
								<script>
									$(document).ready(function() { 
										$("#owl-demo1").owlCarousel({
									 
										  autoPlay: 3000, //Set AutoPlay to 3 seconds
									 
										  items :4,
										  itemsDesktop : [640,5],
										  itemsDesktopSmall : [414,4],
										  navigation : true
									 
										});
										
									}); 
								</script>
								</div></div></div></div></div></div>
						
	<!-- //welcome -->
	<!-- add-products -->
	<div class="add-products"> 
		<div class="container">	
		</div>  	
	</div>
	 