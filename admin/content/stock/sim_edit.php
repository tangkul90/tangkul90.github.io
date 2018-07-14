<?php
include('../../config/koneksi.php');
$id=$_POST['id'];
$motif=$_POST['motif'];
$jumlah_awal=$_POST['jumlah_awal'];
$jumlah_akhir=$_POST['jumlah_akhir'];

$query = mysqli_query($connect,"update kain_masuk set 
 jmlh_kain_masuk='$jumlah_akhir' where kd_kain_masuk='$id'") or die('error kain');

if($query==true){
if($jumlah_awal<$jumlah_akhir){

$total=$jumlah_akhir-$jumlah_awal;
$querys = mysqli_query($connect,"update motif set 
 stock=stock+'$total' where kd_motif='$motif'") or die('error motif');
echo "<script>alert ('Data Stock Barang sudah di Update');document.location='../../index.php?mod=stock&pg=data_stock' </script>";

}elseif($jumlah_awal>$jumlah_akhir){

$total=$jumlah_awal-$jumlah_akhir;
$querys = mysqli_query($connect,"update motif set 
 stock=stock-'$total' where kd_motif='$motif'") or die('error motif');
echo "<script>alert ('Data Stock Barang sudah di Update');document.location='../../index.php?mod=stock&pg=data_stock' </script>";
}
 
}
?>