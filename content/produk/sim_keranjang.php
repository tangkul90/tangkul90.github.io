<?php
session_start();
include"../../admin/config/koneksi.php";

$kd_motif=$_POST['kd_motif'];
$jumlah=$_POST['jumlah'];
$id_customer=$_POST['id_customer'];

$sql=mysqli_query($connect, "SELECT * FROM motif where kd_motif='$kd_motif'") or die ("error");
$data=mysqli_fetch_array($sql);
$stock=$data['stock'];
if($stock<$jumlah){
echo "<script>alert ('Stock Kurang, Jumlah Pesanan anda lebih dari jumlah stock barang');document.location='../../index.php?mod=produk&pg=detail&id=$kd_motif' </script>"; 
}else{
$sql=mysqli_query($connect,"insert into pesanan (id_customer,kd_motif,jumlah_pesanan,status_pesanan) values ('$id_customer','$kd_motif','$jumlah','Keranjang')") or die ("error keranjang".mysql_error());


$sqlu=mysqli_query($connect,"UPDATE motif SET stock=stock-'$jumlah' where kd_motif='$kd_motif'") or die ("error Motif".mysql_error());

header("location:../../index.php?mod=customer&pg=keranjang");
}

?>