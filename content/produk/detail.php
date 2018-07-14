<?php
$sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain and kd_motif='".$_GET['id']."'") or die ("error");
					
					$data=mysqli_fetch_array($sql);
					?>
<script src="js/imagezoom.js"></script>
<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.html">Home</a></li>
			<li class="active">Detail Produk</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="admin/content/motif/<?php echo $data['gambar'] ; ?>">
									<div class="thumb-image detail_images"> <img src="admin/content/motif/<?php echo $data['gambar'] ; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
								
							</ul>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						<h3 class="item_name"><?php echo $data['nm_motif'] ; ?></h3>
						<p></p>
						<div class="single-rating">
							
						</div>
						<div class="single-price">
							<ul>
								<li>Rp.<?php echo number_format($data['harga']) ; ?></li>  
								
							</ul>	
						</div> 
						<p class="single-price-text">Jenis Kain : <?php echo $data['nm_jenis_kain'] ; ?></p>
						<p class="single-price-text">Jumlah Stock Tersisa : <?php echo $data['stock'] ; ?></p>
						<?php

if(empty($_SESSION['email'])){
echo "Silahkan Login Untuk Melakukan Pembelian Barang.!"; 
}else{
$sqlu = mysqli_query($connect, "SELECT * FROM customer WHERE email='".$_SESSION['email']."'");
$datau=mysqli_fetch_array($sqlu);
?>
						<form action="content/produk/sim_keranjang.php" method="post">
						<input type="hidden" name="kd_motif" value="<?php echo $data['kd_motif'] ; ?>">
						<input type="hidden" name="id_customer" value="<?php echo $datau['id_customer'] ; ?>">
						<label>Jumlah :</label>
                        <input type="number" name="jumlah" class="form-control" style="width:100px;" required><br>
							<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
						</form>
						<?php }
?>
					</div>
				   <div class="clearfix"> </div>  
				</div>
				<div class="single-page-icons social-icons"> 
					
				</div>
			</div> 
			<!-- recommendations -->
			<div class="recommend">
				<h3 class="w3ls-title">Our Recommendations </h3> 
				<script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({
					 
						  autoPlay: 3000, //Set AutoPlay to 3 seconds
					 
						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true
					 
						});
						
					}); 
				</script>
				<div id="owl-demo5" class="owl-carousel">
					 
<?php $sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain ORDER BY kd_motif DESC
					") or die ("error");
					
					while($data=mysqli_fetch_array($sql)){?>
									<div class="item">
										<div class="glry-w3agile-grids agileits"> 
											<a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>"><img src="admin/content/motif/<?php echo $data['gambar'] ; ?>" alt="img"></a>
											<div class="view-caption agileits-w3layouts">           
												<h4><a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>"><?php echo $data['nm_motif'] ; ?></a></h4>
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
			<!-- //recommendations --> 
			
		</div>
	</div>
	<!--//products--> 