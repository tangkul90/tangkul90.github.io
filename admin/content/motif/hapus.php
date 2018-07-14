<?php
include('../../config/koneksi.php');
$sql_foto = "SELECT * FROM motif WHERE  kd_motif=".$_GET['id']."";
$qry_foto = mysqli_query($connect, $sql_foto) or die('Gagal query');
$hasil = mysqli_fetch_array($qry_foto);
$gambar=$hasil['gambar'];
unlink("$gambar");	
mysqli_query($connect,"DELETE FROM motif WHERE kd_motif=".$_GET['id']."")or die ('error');
	header("location:../../index.php?mod=motif&pg=data_motif");
	?>