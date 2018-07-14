<?php
$namafolder="gambar/"; 
//tempat menyimpan file 
include('../../admin/config/koneksi.php');
  if (!empty($_FILES["gambar"]["tmp_name"])) {    
     $nama_file =$_FILES['gambar']['type'];
	$kode_pesanan  =$_POST['kode_pesanan'];
	
	  if($nama_file=="image/jpeg" || $nama_file=="image/jpg" || $nama_file=="image/gif" || $nama_file=="image/x-png" || $nama_file=="image/png")     
	  {
	 $image = $namafolder . $kode_pesanan.basename($_FILES['gambar']['name']);   
					if (move_uploaded_file($_FILES['gambar']['tmp_name'], $image)) {  

	 			    $sql=mysqli_query($connect,"UPDATE detail_pesanan SET bukti_transfer='$image',
					status_order='dibayar' WHERE kode_pesanan='$kode_pesanan'
					"            
					) or die ("error");  

					  $sqlp=mysqli_query($connect,"UPDATE pesanan SET
					status_pesanan='Terkirim' WHERE kode_pesanan='$kode_pesanan'
					"            
					) or die ("error");  
					
					echo "<script>alert ('Pembayaran Anda sudah di konfirmasi');document.location='../../index.php?mod=customer&pg=detail_order&kode=$kode_pesanan' </script>"; 
					} 
					else {     echo "<script>alert ('Motif gagal di simpan');document.location='../../index.php?mod=customer&pg=detail_order&kode=$kode_pesanan' </script> "; }  } 
					else {     echo "<script>alert ('Motif gambar yang anda kirim salah. Harus .jpg .gif .png ');document.location='../../index.php?mod=customer&pg=detail_order&kode=$kode_pesanan' </script> "; } } 
					else {     echo "<script>alert ('Anda belum memilih gambar);document.location='../../index.php?mod=customer&pg=detail_order&kode=$kode_pesanan' </script> "; } 
					?> 