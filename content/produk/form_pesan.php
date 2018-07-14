 
							
							<!-- breadcrumbs --> 
	<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.html">Home</a></li>
			<li><a href="index.html">Detail Produk</a></li>
			<li class="active">Form Pesan</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
			<div>
<form action="content/produk/sim_beli.php" method="post">
<input type="hidden" class="form-control" name="kode_pesan" value="<?php echo $_SESSION['kode_pesan']; ?>" > 
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Nama Lengkap :</label>
	<input type="text" class="form-control" name="nama" > 
	</div>
	<div class="form-group">
<label>No Telepon :</label>
	<input type="number" class="form-control" name="telpon">
	</div>
<div class="form-group">
<label>Alamat :</label>
	<textarea class="form-control" name="alamat"></textarea>
	</div>
	<div class="form-group">
	<button type="submit" class="btn btn-primary" style="width: 150px;" ><i class="fa fa-paper-plane"></i> Kirim Pesanan</button> <a href="index.php?mod=produk&pg=produk"><button type="button" class="btn btn-warning" style="width: 150px;" ><i class="fa fa-cart-plus"></i> Belanja Lagi</button></a>
	</div></div>
<div class="col-md-6">
<h3>
	Tanggal : <?php echo date ("d - m - Y");?><br><br>
	<?php if(empty($_SESSION['kode_pesan'])){echo "Barang Masih Kosong";}else{?>
		
	Kode Pemesanan : <?php echo $_SESSION['kode_pesan']; ?></h3>
	<?php }?>
</div>
</div>

</form>

			<table class="table">
				<tr>
					<th>Gambar</th>
					<th>Motip</th>
					<th>Jenis Kain</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
					<th>Option</th>
				</tr>
	<?php
 if(empty($_SESSION['kode_pesan'])){echo "";}else{
											$sql=mysqli_query($koneksi,"select * from pesanan p, kain k, kain_masuk i, motif m, jenis_kain j where p.kd_kain=k.kd_kain and k.kd_kain_masuk=i.kd_kain_masuk and i.kd_motif=m.kd_motif and i.kd_jenis_kain=j.kd_jenis_kain and kode_pesan='$_SESSION[kode_pesan]'"
											) or die("error"); 
											$subtotal=0;
											while($pesan=mysqli_fetch_array($sql)){
											$total=	$pesan['harga']*$pesan['jmlh_pesanan'];	
											$subtotal+=$total;
								?>
				<tr>
				<td><img src="motif_songket/<?php echo $pesan['gambar']; ?>" class="img-thumnail" style="width: 150px;"></td>
				<td><?php echo $pesan['nm_motif'] ;?></td>
				<td><?php echo $pesan['nm_jenis_kain'];?></td>
				<td><?php echo number_format($pesan['harga']);?></td>
				<td><?php echo $pesan['jmlh_pesanan'];?></td>
				<td><?php echo number_format($total);?></td>
				<td><button type="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button></td>	
				</tr>
				<?php }}?>
				<?php if(empty($_SESSION['kode_pesan'])){echo "Barang Masih Kosong";}else{?>
				<tr>
					<th colspan="4"><h3>Total Belanja</h3></th>
					
					<th><h3>:</h3></th>
					<th><h2>Rp.<?php echo number_format($subtotal); ?></h2></th>
					<th></th>
				</tr>
<?php }?>
			</table></div>
				
				
				   <div class="clearfix"> </div>  
				</div>
				
			</div> </div>
			<!-- recommendations -->
			