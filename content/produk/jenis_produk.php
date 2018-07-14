<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="index.html">Home</a></li>
					<li class="active">Products</li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4> Produk Jenis kain : <?php echo $_GET['nama'];?></h4>
					
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
<?php $sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain and m.kd_jenis_kain='".$_GET['id']."' ORDER BY kd_motif DESC
					") or die ("error");
					
					while($data=mysqli_fetch_array($sql)){?>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products">
							
							<a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>"><img src="admin/content/motif/<?php echo $data['gambar'] ; ?>" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>"><?php echo $data['nm_motif'] ; ?></a></h5> 
								<h6>Rp.<?php echo number_format($data['harga']) ; ?></h6> 
								<a href="index.php?mod=produk&pg=detail&id=<?php echo $data['kd_motif'] ; ?>">
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
								</a>
							</div>
						</div> 
					</div>
					<?php }?>
					
					<div class="clearfix"> </div>
				</div>
				
			</div>
			<div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4>Jenis Kain</h4>            
						<div class="row row1 scroll-pane">
						<?php $sqlj=mysqli_query($connect, "SELECT * FROM jenis_kain ORDER BY kd_jenis_kain DESC
					") or die ("error");
					
					while($dataj=mysqli_fetch_array($sqlj)){?>
							<a href="index.php?mod=produk&pg=jenis_produk&id=<?php echo $dataj['kd_jenis_kain']; ?>&nama=<?php echo $dataj['nm_jenis_kain']; ?>"><label class="checkbox"><i></i><?php echo $dataj['nm_jenis_kain']; ?></label></a>
							<?php }?>
							
						</div> 
					</div>
					</div>
				
				<div class="related-row">
					<h4>New Produk</h4>
					<?php $sqln=mysqli_query($connect, "SELECT * FROM motif ORDER BY kd_motif DESC
					limit 3 ") or die ("error");
					
					while($datan=mysqli_fetch_array($sqln)){?>
					<div class="galry-like">  
						<a href="index.php?mod=produk&pg=detail&id=<?php echo $datan['kd_motif'] ; ?>"><img src="admin/content/motif/<?php echo $datan['gambar'] ; ?>" class="img-responsive" alt="img"></a>             
						<h4><a href="index.php?mod=produk&pg=detail&id=<?php echo $datan['kd_motif'] ; ?>"><?php echo $datan['nm_motif'] ; ?></a></h4> 
						<h5>Rp.<?php echo number_format($datan['harga']) ; ?></h5>       
					</div>
                     <hr>
                     <?php }?>
                    
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//products-->  