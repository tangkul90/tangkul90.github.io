<?php
include('../../config/koneksi.php');
$id=$_POST['id'];
$nama=$_POST['nama'];
$biaya=$_POST['biaya'];

$query = mysqli_query($connect,"update pengiriman set 
 nm_pengiriman='$nama', biaya_pengiriman='$biaya' where id_pengiriman='$id'") or die('error');
echo "<script>alert ('Data Pengiriman sudah di Update');document.location='../../index.php?mod=pengiriman&pg=data_pengiriman' </script>"; 
?>