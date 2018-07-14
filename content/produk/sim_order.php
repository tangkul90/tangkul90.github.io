<?php
date_default_timezone_set("Asia/Jakarta");
session_start();
include"../../admin/config/koneksi.php";
$id_customer=$_POST['id_customer'];
$kode_pesanan=$_POST['kode_pesanan'];
$nm_pengiriman=$_POST['nm_pengiriman'];

$sql=mysqli_query($connect,"UPDATE pesanan SET kode_pesanan='$kode_pesanan',status_pesanan='Menunggu' WHERE id_customer='$id_customer' and status_pesanan='Keranjang'") or die ("error".mysql_error());

	$sql=mysqli_query($connect,"insert into detail_pesanan (kode_pesanan,id_customer,id_pengiriman,tanggal_pesan,status_order) values ('$kode_pesanan','$id_customer','$nm_pengiriman','".date("Y-m-d")."','Menunggu')") or die ("error keranjang".mysql_error());

echo "<script>alert ('Yakin Dengan Pesanan Anda');document.location='../../index.php?mod=customer&pg=order'</script>";


?>