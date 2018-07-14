<?php
$namafolder="gambar/"; 
	$nama  =$_POST['nama'];
	$jenis_kain  =$_POST['jenis_kain'];
	$harga  =$_POST['harga'];
$id_motif=$_POST['id_motif'];
//tempat menyimpan file 
include('../../config/koneksi.php');
  if (!empty($_FILES["gambar"]["tmp_name"])) {    
     $nama_file =$_FILES['gambar']['type'];
	  if($nama_file=="image/jpeg" || $nama_file=="image/jpg" || $nama_file=="image/gif" || $nama_file=="image/x-png" || $nama_file=="image/png")     
	  {
	 $image = $namafolder . $nama.basename($_FILES['gambar']['name']);   
					if (move_uploaded_file($_FILES['gambar']['tmp_name'], $image)) { 
$sql_foto = "SELECT * FROM motif WHERE  kd_motif='$id_motif'";
$qry_foto = mysqli_query($connect, $sql_foto) or die('Gagal query');
$hasil = mysqli_fetch_array($qry_foto);
$gambar=$hasil['gambar'];
unlink("$gambar");	
                 
	 			    $sql=mysqli_query($connect,"UPDATE motif SET nm_motif='$nama',kd_jenis_kain='$jenis_kain',harga='$harga',gambar='$image' WHERE kd_motif='$id_motif'
					"            
					) or die ("error");  
					 
					
					echo "<script>alert ('Motif sudah di Update');document.location='../../index.php?mod=motif&pg=data_motif' </script>"; 
					} 
					else {     echo "<script>alert ('Motif gagal di simpan');document.location='../../index.php?mod=motif&pg=data_motif' </script> "; }  } 
					else {     echo "<script>alert ('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png ');document.location='../../index.php?mod=motif&pg=data_motif' </script> "; } } 
					else {    
					 $sql=mysqli_query($connect,"UPDATE motif SET nm_motif='$nama',kd_jenis_kain='$jenis_kain',harga='$harga' WHERE kd_motif='$id_motif'
					"            
					) or die ("error");
					echo "<script>alert ('Motif sudah di Update');document.location='../../index.php?mod=motif&pg=data_motif' </script>";  } 
					?> 