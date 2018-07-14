<?php
include"../../admin/config/koneksi.php";
$kode_order=$_GET['kode_order'];

$sql_sel=mysqli_query($connect, "SELECT * FROM pesanan WHERE kode_pesanan='$kode_order'") or die("error Select");
while($data=mysqli_fetch_array($sql_sel)){
$kd_motif=$data['kd_motif'];
$qty=$data['jumlah_pesanan'];

$sql_up=mysqli_query($connect, "UPDATE motif SET stock=stock+'$qty' WHERE kd_motif='$kd_motif'") or die("error update");
}

$sql="DELETE FROM pesanan WHERE kode_pesanan='$kode_order'";             
					$res=mysqli_query($connect, $sql) or die ("error");
$sql_o="DELETE FROM detail_pesanan WHERE kode_pesanan='$kode_order'";             
					$res_o=mysqli_query($connect, $sql_o) or die ("error");
					  
					header("location:../../index.php?mod=customer&pg=order");
?>