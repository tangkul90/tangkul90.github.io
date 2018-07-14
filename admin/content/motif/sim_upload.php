<?php
$namafolder="gambar/"; 
//tempat menyimpan file 
include('../../config/koneksi.php');
  if (!empty($_FILES["gambar"]["tmp_name"])) {    
     $nama_file =$_FILES['gambar']['type'];
	$nama  =$_POST['nama'];
	$jenis_kain  =$_POST['jenis_kain'];
	$harga  =$_POST['harga'];
	
	  if($nama_file=="image/jpeg" || $nama_file=="image/jpg" || $nama_file=="image/gif" || $nama_file=="image/x-png" || $nama_file=="image/png")     
	  {
	 $image = $namafolder . $nama.basename($_FILES['gambar']['name']);   
					if (move_uploaded_file($_FILES['gambar']['tmp_name'], $image)) {                  
	 			    $sql="insert into motif 
					(nm_motif,kd_jenis_kain,harga,gambar) 
					values('$nama','$jenis_kain','$harga','$image')";             
					$res=mysqli_query($connect, $sql) or die ("error produk"); 
					
					echo "<script>alert ('Motif sudah di simpan');document.location='../../index.php?mod=motif&pg=data_motif' </script>"; 
					} 
					else {     echo "<script>alert ('Motif gagal di simpan');document.location='../../index.php?mod=motif&pg=data_motif' </script> "; }  } 
					else {     echo "<script>alert ('Motif gambar yang anda kirim salah. Harus .jpg .gif .png ');document.location='../../index.php?mod=motif&pg=data_motif' </script> "; } } 
					else {     echo "<script>alert ('Anda belum memilih gambar);document.location='../../index.php?mod=motif&pg=data_motif' </script> "; } 
					?> 