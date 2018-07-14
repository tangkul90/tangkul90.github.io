<?php
include"../../admin/config/koneksi.php";
$id_pesanan=$_GET['id_pesanan'];
$kd_motif=$_GET['kd_motif'];
$jumlah=$_GET['jumlah'];

$sql_up=mysqli_query($connect, "UPDATE motif SET stock=stock+'$jumlah' WHERE kd_motif='$kd_motif'") or die("error update");

$sql="DELETE FROM pesanan WHERE id_pesanan='$id_pesanan'";             
					$res=mysqli_query($connect, $sql) or die ("error");  
					header("location:../../index.php?mod=customer&pg=keranjang")
?>