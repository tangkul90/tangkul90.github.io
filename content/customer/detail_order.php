<style type="text/css">.thumb-image{float:left;width:250px;position:relative;padding:; border:3px #ccc solid;}</style>
<?php

if(empty($_SESSION['email'])){
echo "<script>alert ('Silahkan Login, Untuk Melihat Keranjang Belanja...!!!');document.location='index.php?mod=customer&pg=login' </script>"; 
}else{
$account = mysqli_query($connect, "SELECT * FROM customer WHERE email='".$_SESSION['email']."'");
$data_account=mysqli_fetch_array($account);
$order = mysqli_query($connect, "SELECT * FROM detail_pesanan d, pengiriman p WHERE d.id_pengiriman=p.id_pengiriman and kode_pesanan='".$_GET['kode']."'");
$datao=mysqli_fetch_array($order);
}
?>
<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.html">Home</a></li>
			<li class="active">Detail Order</li>
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
	
	</div>
<div class="form-group">
<label>Tanggal Order : <?php echo $datao['tanggal_pesan'];?></label>
	
	</div><div class="form-group">
<label>Kode Order : <?php echo $datao['kode_pesanan'];?></label>
	
	</div>
<div class="form-group">
<label>Jenis Pengiriman : <?php echo $datao['nm_pengiriman'];?></label>
	
	</div>
	<div class="form-group">
<label>Biaya Pengiriman : Rp.<?php echo number_format($datao['biaya_pengiriman']);?></label>
	
	</div>
	<div class="form-group">
<label>Status Order : <?php echo $datao['status_order'];?></label>
	
	</div>
</div>

<div class="col-md-6">

<?php if($datao['status_order']=="Menunggu"){?>
<?php
 $query = mysqli_query($connect,"SELECT *,DATE_ADD(tanggal_pesan, INTERVAL 2 DAY) as jatuh_tempo, DATEDIFF(DATE_ADD(tanggal_pesan, INTERVAL 2 DAY), CURDATE()) as selisih FROM detail_pesanan where kode_pesanan='$_GET[kode]'");
        while ($data = mysqli_fetch_array($query)) {
			
			echo '<div class="alert alert-danger" role="alert">
					<strong>Batas Pembayaran : Tanggal '.date("d M Y",strtotime($data['jatuh_tempo'])).' ('.$data['selisih'].' Hari Lagi ) !</strong><br> Silahkan Lakukan Pembayaran dan konfirmasi Pembayaran, Batas pembayaran <b>jam 12:00 PM</b>.!!!
					<br><br><b><a href="index.php?mod=pages&pg=cara_pembayaran">Cara Melakukan Pembayaran</a></b>
			   </div>';
			if($data['selisih']<=0){
				echo "<script>alert ('Batas Waktu Pembayaran Sudah Habis');document.location='content/customer/hapus_order.php?kode_order=$_GET[kode]' </script>"; 
			}
		}
?>
			   <form method="post" action="content/customer/sim_transfer.php" enctype="multipart/form-data">
			   <input type="hidden" name="kode_pesanan" value="<?php echo $datao['kode_pesanan'];?>">
			   <div class="row">
			  <div class="col-md-6">
			   <div class="form-group">
<label>Bukti Transfer :</label>
 <input type="file" id="fileUpload" name="gambar" required multiple="multiple">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary" ><i class="fa fa-cc-visa"></i> Konfirmasi</button> <a href="content/customer/hapus_order.php?kode_order=<?php echo $_GET['kode']; ?>"><button type="button" class="btn btn-danger" ><i class="fa fa-trash"></i> Batalkan Order</button></a>
</div>
</div>
<div class="col-md-6">
  <p class="help-block"  id="image-holder"></p>

</div></div>
			   </form>
	<?php }else{?>
<div class="form-group">
<label>Bukti Transfer : </label>
<p><img src="content/customer/<?php echo $datao['bukti_transfer'];?>" class="img-thumnail" style="width: 350px;"></p>
</div>


	<?php	} ?>


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
					
				</tr>
	<?php
											$sql=mysqli_query($connect,"select * from pesanan p, customer c, motif m, jenis_kain j where p.id_customer=c.id_customer and p.kd_motif=m.kd_motif and m.kd_jenis_kain=j.kd_jenis_kain and p.kode_pesanan='".$_GET['kode']."' order by p.id_pesanan ") or die("error"); 
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
				
				</tr>
				<?php }?>
				
				<tr>
					<th colspan="4"><h3>Biaya Kirim</h3></th>
					
					<th><h3>:</h3></th>
					<th><h2>Rp.<?php echo number_format($datao['biaya_pengiriman']); ?></h2></th>
					
				</tr>
				<tr>
					<th colspan="4"><h3>Total Belanja</h3></th>
					
					<th><h3>:</h3></th>
					<th><h2>Rp.<?php echo number_format($subtotal); ?></h2></th>
					
				</tr>
				</tr>
				<tr>
					<th colspan="4"><h3>Total</h3></th>
					
					<th><h3>:</h3></th>
					<th><h2>Rp.<?php echo number_format($subtotal+$datao['biaya_pengiriman']); ?></h2></th>
					
				</tr>
			</table></div>
				
				
				   <div class="clearfix"> </div>  
				</div>
			
		</div>
	</div>
	

<script>
$(document).ready(function() {
        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Silahkan Pilih File Gambar saja .gip, .png, .jpg, dan . jpeg");
          }
        });
      });
</script>