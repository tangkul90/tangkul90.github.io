<?php
include('../../config/koneksi.php');
	$id =$_POST['id'];
	$nama  =$_POST['nama'];
	 

$query = mysqli_query($connect, "update admin set 
 nama_lengkap='$nama'
  where username='$id'") or die('error');
echo "<script>alert ('Profil Telah di Update ');document.location='../../index.php?mod=user&pg=profil' </script>"; 

?> 