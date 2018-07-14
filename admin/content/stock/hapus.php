<?php
include('../../config/koneksi.php');
mysqli_query($connect,"DELETE FROM kain_masuk WHERE kd_kain_masuk=".$_GET['id']."")or die ('error');

$querys = mysqli_query($connect,"update motif set 
 stock=stock-'".$_GET['jumlah']."' where kd_motif='".$_GET['motif']."'") or die('error motif');

	header("location:../../index.php?mod=stock&pg=data_stock");
	?>