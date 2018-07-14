<?php
include('../../config/koneksi.php');
$id=$_POST['id'];
$nama=$_POST['nama'];

$query = mysqli_query($connect,"update jenis_kain set 
 nm_jenis_kain='$nama' where kd_jenis_kain='$id'") or die('error');
echo "<script>alert ('Data Jenis Kain sudah di Update');document.location='../../index.php?mod=jenis_kain&pg=data_jenis' </script>"; 
?>