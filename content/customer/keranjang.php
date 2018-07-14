<?php

if(empty($_SESSION['email'])){
echo "<script>alert ('Silahkan Login, Untuk Melihat Keranjang Belanja...!!!');document.location='index.php?mod=customer&pg=login' </script>"; 
}else{
$account = mysqli_query($connect, "SELECT * FROM customer WHERE email='".$_SESSION['email']."'");
$data_account=mysqli_fetch_array($account);
$kode=date("Ymd")."".(rand());
}
?>
<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.html">Home</a></li>
			<li class="active">Keranjang Belanja</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			
<div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Nama Lengkap : <?php echo $data_account['nama']; ?></label>
	
	</div>
	<div class="form-group">
<label>Email : <?php echo $data_account['email']; ?></label>
	
	</div>
	<div class="form-group">
<label>No Telepon : <?php echo $data_account['no_telpon']; ?></label>
	
	</div>
<div class="form-group">
<label>Alamat : <?php echo $data_account['alamat']; ?></label>
y
	</div>

	<div class="form-group">
	<form action="content/produk/sim_order.php" method="post">
	<b>Pengiriman :</b><br/><br/>
	
			<table class="table">
				<tr>
					<th></th>
					<th>Nama Pengiriman</th>
					<th>Biaya Pengiriman</th>
				</tr>
				<?php
		
		$pengiriman=mysqli_query($connect, "SELECT * FROM pengiriman order by id_pengiriman desc") or die('mysqli_error');
		while($peng=mysqli_fetch_array($pengiriman)){
			?>
				<tr>
					<td><input type="radio" name="nm_pengiriman" required="required" value="<?php echo $peng['id_pengiriman']; ?>" ></td>
					<td><?php echo $peng['nm_pengiriman']; ?></td>
					<td>Rp.<?php echo number_format($peng['biaya_pengiriman']); ?></td>
				</tr>
				<?php 
	}
	?>
			 </table>
		

<input type="hidden" class="form-control" name="kode_pesanan" value="<?php echo $kode; ?>" > 
<input type="hidden" class="form-control" name="id_customer" value="<?php echo $data_account['id_customer']; ?>" > 
	<button type="submit" class="btn btn-primary" style="width: 150px;" ><i class="fa fa-paper-plane"></i>Pesan</button> <a href="index.php?mod=produk&pg=produk"><button type="button" class="btn btn-warning" style="width: 150px;" ><i class="fa fa-cart-plus"></i> Belanja Lagi</button></a>

</form>
	</div></div>
<div class="col-md-6">
<h3>
	Tanggal : <?php echo date ("d - m - Y");?>
</div>
</div>


			<table class="table">
				<tr>
					<th>Gambar</th>
					<th>Motif</th>
					<th>Jenis Kain</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
					<th>Option</th>
				</tr>
	<?php
											$sql=mysqli_query($connect,"select * from pesanan p, customer c, motif m, jenis_kain j where p.id_customer=c.id_customer and p.kd_motif=m.kd_motif and m.kd_jenis_kain=j.kd_jenis_kain and c.email='".$_SESSION['email']."' and status_pesanan='Keranjang' order by p.id_pesanan desc ") or die("error"); 
											$subtotal=0;
											while($pesan=mysqli_fetch_array($sql)){
											$total=	$pesan['harga']*$pesan['jumlah_pesanan'];	
											$subtotal+=$total;
								?>
				<tr>
				<td><img src="admin/content/motif/<?php echo $pesan['gambar']; ?>" class="img-thumnail" style="width: 150px;"></td>
				<td><?php echo $pesan['nm_motif'] ;?></td>
				<td><?php echo $pesan['nm_jenis_kain'];?></td>
				<td><?php echo number_format($pesan['harga']);?></td>
				<td><?php echo $pesan['jumlah_pesanan'];?></td>
				<td><?php echo number_format($total);?></td>
				<td><a href="content/customer/hapus_keranjang.php?id_pesanan=<?php echo $pesan['id_pesanan'];?>&jumlah=<?php echo $pesan['jumlah_pesanan'];?>&kd_motif=<?php echo $pesan['kd_motif'];?>"><button type="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button></a></td>	
				</tr>
				<?php }?>
				<tr>
					<th colspan="4"><h3>Total Belanja</h3></th>
					
					<th><h3>:</h3></th>
					<th><h2>Rp.<?php echo number_format($subtotal); ?></h2></th>
					<th></th>
				</tr>
			</table></div>
				
				
				   <div class="clearfix"> </div>  
				</div>
			
		</div>
	</div>
	<!--//products--> 